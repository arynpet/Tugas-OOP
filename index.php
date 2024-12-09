<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Body Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: aliceblue;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            box-sizing: border-box;
        }

        /* Container Styles */
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 90%;
            text-align: center;
        }

        .container h1 {
            font-size: 24px; /* Ukuran lebih kecil */
            margin-bottom: 20px;
            color: #0B1215;
            font-weight: 500;
        }

        .button-grid {
            display: flex;
            flex-direction: column; /* Atur tombol vertikal */
            gap: 10px; /* Jarak antar tombol */
        }

        .button-grid a {
            padding: 10px;
            text-decoration: none;
            color: white;
            background: #007bff;
            border-radius: 5px; /* Sudut sedikit membulat */
            font-size: 16px;
            font-weight: normal;
            text-align: center;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            .container h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang</h1>
        <div class="button-grid">
            <a href="databarang.php">Kelola Barang</a>
            <a href="datacustomer.php">Kelola Pelanggan</a>
        </div>
    </div>
</body>
</html>
