<?php
include('koneksi.php');

function formatPhoneNumber($phoneNumber) {
    // Menghilangkan angka 0 di depan nomor
    if (substr($phoneNumber, 0, 1) === "0") {
        $phoneNumber = "62" . substr($phoneNumber, 1);
    }
    return $phoneNumber;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan dan WhatsApp</title>

    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

    <?php
    // Ambil data dari database
    $query = "SELECT Nama_Customer, Nopol_Kendaraan, No_Container, Material_Description, Quotation_SO_UoM, nomor_sales, Tanggal_DO
              FROM nama_tabel
              ORDER BY Nama_Customer, Nopol_Kendaraan, nomor_sales";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah ada data
    if (mysqli_num_rows($result) > 0) {
        $currentCustomer = '';
        $currentPolisi = '';
        $currentSales = '';
        $materialDetails = array(); // Array untuk menyimpan detail material setiap pelanggan

        // Loop melalui data
        while ($row = mysqli_fetch_assoc($result)) {
            $namaCustomer = $row['Nama_Customer'];
            $nomorPolisi = $row['Nopol_Kendaraan'];
            $noContainer = $row['No_Container'];
            $materialDescription = $row['Material_Description'];
            $quantity = $row['Quotation_SO_UoM'];
            $nomorSales = formatPhoneNumber($row['nomor_sales']);
            $tanggal = $row['Tanggal_DO'];

            // Jika pelanggan baru, polisi baru, atau sales baru, proses data pelanggan sebelumnya
            if ($currentCustomer != $namaCustomer || $currentPolisi != $nomorPolisi || $currentSales != $nomorSales) {
                if ($currentCustomer != '') {
                    // Tampilkan total kuantitas
                    echo "<p class='card-text'>Total Kuantitas: $totalQuantity</p>";

                    // Ubah total beban ke format tanpa tanda "." sebagai pemisah ribuan
                    $totalBebanFormatted = number_format($totalBeban, 0, '.', '.');

                    // Bangun pesan WhatsApp menggunakan array materialDetails
                    $whatsappMessage = "Kami dari PT Suri Tani Pemuka, Menginformasikan order terkirim kepada anda : " . "\n" .
                        "==================================" . "\n" .
                        "Tanggal: $tanggal" . "\n" .
                        "Nama Customer: $currentCustomer" . "\n" .
                        "Nomor Polisi: $currentPolisi" . "\n" .
                        "Nomor Kontainer: $noContainer" . "\n" .
                        "----------------------------------" . "\n" .
                        "Material & Quantity:" . "\n" .
                        implode("\n", $materialDetails) . "\n" .
                        "----------------------------------" . "\n" .
                        "Total Beban: $totalBebanFormatted KG";

                    echo "<a class='btn btn-primary mt-3' href=\"javascript:void(0);\" onclick=\"openWhatsApp('$nomorSales', '" . urlencode($whatsappMessage) . "');\">Kirim pesan WhatsApp</a>";
                    echo "</div>"; // Tutup card-body
                    echo "</div>"; // Tutup card
                }
                // munculno
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<p class='card_text'>Tanggal: $tanggal</p>";
                echo "<h5 class='card-title'>Nama Customer: $namaCustomer</h5>";
                echo "<p class='card-text'>Nomor Polisi: $nomorPolisi</p>";
                echo "<p class='card-text'>Nomor Kontainer: $noContainer</p>";
                echo "<p class='card-text'>Material & Quantity:</p>";
                echo "<div>"; // Mulai baris untuk detail material

                $totalBeban = 0;
                $totalQuantity = 0;
                $currentCustomer = $namaCustomer;
                $currentPolisi = $nomorPolisi;
                $currentSales = $nomorSales;

                // Reset array materialDetails untuk pelanggan baru
                $materialDetails = array();
            }

            // Tambahkan detail material ke array
            $materialDetails[] = "$materialDescription ($quantity KG) ";

            // Tampilkan detail material untuk setiap pelanggan
            echo "<p class='card-text'>$materialDescription ($quantity KG)</p>";

            // Hapus tanda "." dan konversi ke integer
            $quantityValue = (int)str_replace('.', '', $quantity);

            $totalBeban += $quantityValue;
            $totalQuantity += $quantityValue;
        }
        // Tampilkan total kuantitas untuk pelanggan terakhir
        echo "<p class='card-text'>Total Kuantitas: $totalQuantity</p>";

        // Ubah total beban ke format tanpa tanda "." sebagai pemisah ribuan
        $totalBebanFormatted = number_format($totalBeban, 0, '.', '.');

        // Bangun pesan WhatsApp untuk pelanggan terakhir
        $whatsappMessage = "Kami dari PT Suri Tani Pemuka, Menginformasikan order terkirim kepada anda : " . "\n" .
            "==================================" . "\n" .
            "Tanggal: $tanggal" . "\n" .
            "Nama Customer: $currentCustomer" . "\n" .
            "Nomor Polisi: $currentPolisi" . "\n" .
            "Nomor Kontainer: $noContainer" . "\n" .
            "----------------------------------" . "\n" .
            "Material & Quantity:" . "\n" .
            implode("\n", $materialDetails) . "\n" .
            "----------------------------------" . "\n" .
            "Total Beban: $totalBebanFormatted KG";

        echo "<a class='btn btn-primary mt-3' href=\"javascript:void(0);\" onclick=\"openWhatsApp('$nomorSales', '" . urlencode($whatsappMessage) . "');\">Kirim pesan WhatsApp</a>";
        echo "</div>";
        echo "</div>";

        // Tutup koneksi database
        mysqli_close($koneksi);
    } else {
        echo "<p class='mt-3'>Tidak ada data ditemukan.</p>";
    }
    ?>

    <!-- Tambahkan Bootstrap JS dan Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function openWhatsApp(nomorSales, message) {
            var wa_link = "https://wa.me/" + nomorSales + "?text=" + message;
            window.open(wa_link, '_blank');
        }
    </script>
</body>

</html>
