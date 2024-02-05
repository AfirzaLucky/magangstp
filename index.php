<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Data Pengiriman</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            padding: 20px;
            background-color: #fff; /* Light background color */
        }

        .logo-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 100px;
        }

        .logo-text {
            font-size: 30px;
            font-weight: bold;
            margin: 0;
        }

        label {
            margin-top: 10px;
        }

        /* Additional styles for the file upload form */
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: whitesmoke; /* White background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 225);
        }

        button {
            margin-top: 10px;
        }

        /* Additional styles can be added as needed */
    </style>
</head>

<body>
    <div class="container">
        <div class="logo-container">
            <img src="japfa.jpg" alt="Japfa Logo" class="logo">
            <p class="logo-text">Upload Data Pengiriman</p>
            <img src="stp.jpg" alt="STP Logo" class="logo">
        </div>

        <form action="upload.php" method="post" enctype="multipart/form-data" class="mt-3">
            <div class="form-group">
                <label for="file">Pilih file CSV:</label>
                <input type="file" class="form-control-file" name="file" id="file" accept=".csv" required>
            </div>
            <button type="submit" class="btn btn-success" name="upload">Upload</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
