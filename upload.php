<?php
if (isset($_POST['upload'])) {
    $file = $_FILES['file']['tmp_name'];

    // Define the delimiter used in your CSV file (e.g., ";")
    $delimiter = ";";

    if (($handle = fopen($file, "r")) !== FALSE) {
        // Include your database connection here
        include('koneksi.php');
        // Empty the existing table
        $truncateQuery = "TRUNCATE TABLE `nama_tabel`";
        mysqli_query($koneksi, $truncateQuery);

        // Read CSV file, starting from the second row
        while (($data = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
            $Delivery_Type = mysqli_real_escape_string($koneksi, $data[0]);
            $No_DO_SJ = mysqli_real_escape_string($koneksi, $data[1]);
            $No_Item = mysqli_real_escape_string($koneksi, $data[2]);
            $No_Urut_File = mysqli_real_escape_string($koneksi, $data[3]);
            $Tanggal_DO = mysqli_real_escape_string($koneksi, $data[4]);
            $Tanggal_SJ = mysqli_real_escape_string($koneksi, $data[5]);
            $No_SO_PO = mysqli_real_escape_string($koneksi, $data[6]);
            $Tanggal_SO = mysqli_real_escape_string($koneksi, $data[7]);
            $Quotation_No = mysqli_real_escape_string($koneksi, $data[8]);
            $Quotation_Date = mysqli_real_escape_string($koneksi, $data[9]);
            $Collective_No = mysqli_real_escape_string($koneksi, $data[10]);
            $PO_No = mysqli_real_escape_string($koneksi, $data[11]);
            $No_Invoice = mysqli_real_escape_string($koneksi, $data[12]);
            $No_DN_Transport = mysqli_real_escape_string($koneksi, $data[13]);
            $ID_Owner = mysqli_real_escape_string($koneksi, $data[14]);
            $Nama_Owner = mysqli_real_escape_string($koneksi, $data[15]);
            $ID_Customer = mysqli_real_escape_string($koneksi, $data[16]);
            $Nama_Customer = mysqli_real_escape_string($koneksi, $data[17]);
            $ID_Shipto = mysqli_real_escape_string($koneksi, $data[18]);
            $Dikirim_kepada = mysqli_real_escape_string($koneksi, $data[19]);
            $Alamat = mysqli_real_escape_string($koneksi, $data[20]);
            $Kota = mysqli_real_escape_string($koneksi, $data[21]);
            $Region = mysqli_real_escape_string($koneksi, $data[22]);
            $Region_Desc = mysqli_real_escape_string($koneksi, $data[23]);
            $DO_FwdAgent = mysqli_real_escape_string($koneksi, $data[24]);
            $DO_FwdAgent_Name = mysqli_real_escape_string($koneksi, $data[25]);
            $Nopol_Kendaraan = mysqli_real_escape_string($koneksi, $data[26]);
            $No_Container = mysqli_real_escape_string($koneksi, $data[27]);
            $No_Shipment = mysqli_real_escape_string($koneksi, $data[28]);
            $Shipment_FwdAgent = mysqli_real_escape_string($koneksi, $data[29]);
            $Shipment_FwdAgent_Name = mysqli_real_escape_string($koneksi, $data[30]);
            $Destination = mysqli_real_escape_string($koneksi, $data[31]);
            $Destination_Desc = mysqli_real_escape_string($koneksi, $data[32]);
            $No_Shipment_Cost = mysqli_real_escape_string($koneksi, $data[33]);
            $Nilai_Shipment_Cost = mysqli_real_escape_string($koneksi, $data[34]);
            $Material_Number = mysqli_real_escape_string($koneksi, $data[35]);
            $Material_Description = mysqli_real_escape_string($koneksi, $data[36]);
            $Unit_of_Measure = mysqli_real_escape_string($koneksi, $data[37]);
            $Sales_Unit = mysqli_real_escape_string($koneksi, $data[38]);
            $Pricing_Reff_Material = mysqli_real_escape_string($koneksi, $data[39]);
            $Pricing_Reff_Material_Desc = mysqli_real_escape_string($koneksi, $data[40]);
            $Quotation_Qty_SU = mysqli_real_escape_string($koneksi, $data[41]);
            $Quotation_Qty_UoM = mysqli_real_escape_string($koneksi, $data[42]);
            $Quotation_Value = mysqli_real_escape_string($koneksi, $data[43]);
            $Quotation_SO_SU = mysqli_real_escape_string($koneksi, $data[44]);
            $Quotation_SO_UoM = mysqli_real_escape_string($koneksi, $data[45]);
            $Nilai_SO = mysqli_real_escape_string($koneksi, $data[46]);
            $Quantity_DO_SU = mysqli_real_escape_string($koneksi, $data[47]);
            $Quantity_DO_UoM = mysqli_real_escape_string($koneksi, $data[48]);
            $Quantity_Invoice_SU = mysqli_real_escape_string($koneksi, $data[49]);
            $Quantity_Invoice_UoM = mysqli_real_escape_string($koneksi, $data[50]);
            $Nilai_Invoice = mysqli_real_escape_string($koneksi, $data[51]);
            $Nilai_Transport = mysqli_real_escape_string($koneksi, $data[52]);
            $Nilai_Asuransi = mysqli_real_escape_string($koneksi, $data[53]);
            $Nilai_Transport_dan_Asuransi = mysqli_real_escape_string($koneksi, $data[54]);
            $Tgl_Jatuh_Tepo = mysqli_real_escape_string($koneksi, $data[55]);
            $Sales_Office = mysqli_real_escape_string($koneksi, $data[56]);
            $Sales_Group = mysqli_real_escape_string($koneksi, $data[57]);
            $Sales_Group_Desc = mysqli_real_escape_string($koneksi, $data[58]);
            $Supervisor = mysqli_real_escape_string($koneksi, $data[59]);
            $Supervisor_Desc = mysqli_real_escape_string($koneksi, $data[60]);
            $Sales_Employee = mysqli_real_escape_string($koneksi, $data[61]);
            $Sales_Employee_Desc = mysqli_real_escape_string($koneksi, $data[62]);
            $Plant = mysqli_real_escape_string($koneksi, $data[63]);
            $Distribution_Channel = mysqli_real_escape_string($koneksi, $data[64]);
            $Divisi = mysqli_real_escape_string($koneksi, $data[65]);
            $Production_Hierarchy = mysqli_real_escape_string($koneksi, $data[66]);
            $Mat_Group_3 = mysqli_real_escape_string($koneksi, $data[67]);
            $Item_Cat = mysqli_real_escape_string($koneksi, $data[68]);
            $No_Internal_Order = mysqli_real_escape_string($koneksi, $data[69]);
            $Desc_Internal_Order = mysqli_real_escape_string($koneksi, $data[70]);
            $Cust_Order = mysqli_real_escape_string($koneksi, $data[71]);
            $Currency = mysqli_real_escape_string($koneksi, $data[72]);
            $Exchange_Rate = mysqli_real_escape_string($koneksi, $data[73]);
            $Pajak = mysqli_real_escape_string($koneksi, $data[74]);
            $Invoice_Pajak = mysqli_real_escape_string($koneksi, $data[75]);
            $Material_Group_1 = mysqli_real_escape_string($koneksi, $data[76]);
            $Material_Group_1_Desc = mysqli_real_escape_string($koneksi, $data[77]);
            $Material_Group_2 = mysqli_real_escape_string($koneksi, $data[78]);
            $Material_Group_2_Desc = mysqli_real_escape_string($koneksi, $data[79]);
            $Material_Group_3 = mysqli_real_escape_string($koneksi, $data[80]);
            $Material_Group_3_Desc = mysqli_real_escape_string($koneksi, $data[81]);
            $Prodhier_Lv3 = mysqli_real_escape_string($koneksi, $data[82]);
            $Prodhier_Lv3_Desc = mysqli_real_escape_string($koneksi, $data[83]);
            $Prodhier_Lv4 = mysqli_real_escape_string($koneksi, $data[84]);
            $Prodhier_Lv4_Desc = mysqli_real_escape_string($koneksi, $data[85]);
            $nama_sales = mysqli_real_escape_string($koneksi, $data[86]);
            $nomor_sales = mysqli_real_escape_string($koneksi, $data[87]);

            // Insert data into the database
            $insertQuery = "INSERT INTO nama_tabel (Delivery_Type, No_DO_SJ, No_Item, No_Urut_File, Tanggal_DO, Tanggal_SJ, No_SO_PO, Tanggal_SO, Quotation_No, Quotation_Date, Collective_No, PO_No, No_Invoice, No_DN_Transport, ID_Owner, Nama_Owner, ID_Customer, Nama_Customer, ID_Shipto, Dikirim_kepada, Alamat, Kota, Region, Region_Desc, DO_FwdAgent, DO_FwdAgent_Name, Nopol_Kendaraan, No_Container, No_Shipment, Shipment_FwdAgent, Shipment_FwdAgent_Name, Destination, Destination_Desc, No_Shipment_Cost, Nilai_Shipment_Cost, Material_Number, Material_Description, Unit_of_Measure, Sales_Unit, Pricing_Reff_Material, Pricing_Reff_Material_Desc, Quotation_Qty_SU, Quotation_Qty_UoM, Quotation_Value, Quotation_SO_SU, Quotation_SO_UoM, Nilai_SO, Quantity_DO_SU, Quantity_DO_UoM, Quantity_Invoice_SU, Quantity_Invoice_UoM, Nilai_Invoice, Nilai_Transport, Nilai_Asuransi, Nilai_Transport_dan_Asuransi, Tgl_Jatuh_Tepo, Sales_Office, Sales_Group, Sales_Group_Desc, Supervisor, Supervisor_Desc, Sales_Employee, Sales_Employee_Desc, Plant, Distribution_Channel, Divisi, Production_Hierarchy, Mat_Group_3, Item_Cat, No_Internal_Order, Desc_Internal_Order, Cust_Order, Currency, Exchange_Rate, Pajak, Invoice_Pajak, Material_Group_1, Material_Group_1_Desc, Material_Group_2, Material_Group_2_Desc, Material_Group_3, Material_Group_3_Desc, Prodhier_Lv3, Prodhier_Lv3_Desc, Prodhier_Lv4, Prodhier_Lv4_Desc, nama_sales, nomor_sales)
            VALUES ('$Delivery_Type', '$No_DO_SJ', '$No_Item', '$No_Urut_File', '$Tanggal_DO', '$Tanggal_SJ', '$No_SO_PO', '$Tanggal_SO', '$Quotation_No', '$Quotation_Date', '$Collective_No', '$PO_No', '$No_Invoice', '$No_DN_Transport', '$ID_Owner', '$Nama_Owner', '$ID_Customer', '$Nama_Customer', '$ID_Shipto', '$Dikirim_kepada', '$Alamat', '$Kota', '$Region', '$Region_Desc', '$DO_FwdAgent', '$DO_FwdAgent_Name', '$Nopol_Kendaraan', '$No_Container', '$No_Shipment', '$Shipment_FwdAgent', '$Shipment_FwdAgent_Name', '$Destination', '$Destination_Desc', '$No_Shipment_Cost', '$Nilai_Shipment_Cost', '$Material_Number', '$Material_Description', '$Unit_of_Measure', '$Sales_Unit', '$Pricing_Reff_Material', '$Pricing_Reff_Material_Desc', '$Quotation_Qty_SU', '$Quotation_Qty_UoM', '$Quotation_Value', '$Quotation_SO_SU', '$Quotation_SO_UoM', '$Nilai_SO', '$Quantity_DO_SU', '$Quantity_DO_UoM', '$Quantity_Invoice_SU', '$Quantity_Invoice_UoM', '$Nilai_Invoice', '$Nilai_Transport', '$Nilai_Asuransi', '$Nilai_Transport_dan_Asuransi', '$Tgl_Jatuh_Tepo', '$Sales_Office', '$Sales_Group', '$Sales_Group_Desc', '$Supervisor', '$Supervisor_Desc', '$Sales_Employee', '$Sales_Employee_Desc', '$Plant', '$Distribution_Channel', '$Divisi', '$Production_Hierarchy', '$Mat_Group_3', '$Item_Cat', '$No_Internal_Order', '$Desc_Internal_Order', '$Cust_Order', '$Currency', '$Exchange_Rate', '$Pajak', '$Invoice_Pajak', '$Material_Group_1', '$Material_Group_1_Desc', '$Material_Group_2', '$Material_Group_2_Desc', '$Material_Group_3', '$Material_Group_3_Desc', '$Prodhier_Lv3', '$Prodhier_Lv3_Desc', '$Prodhier_Lv4', '$Prodhier_Lv4_Desc', '$nama_sales', '$nomor_sales')";
            mysqli_query($koneksi, $insertQuery);
        }

        fclose($handle);
        mysqli_close($koneksi);
        header('Location: proses_checkbox.php');
    } else {
        echo "Error reading the CSV file";
    }
}
?>