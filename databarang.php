<?php
session_start(); // Mulai sesi untuk notifikasi
require_once 'barang.php';
require_once 'barangManager.php';

$barangManager = new BarangManager();

// Tambah Barang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $barangManager->tambahBarang($nama, $harga, $stok);
    $_SESSION['message'] = "Barang berhasil ditambahkan!";
    header('Location: databarang.php');
    exit;
}

// Hapus Barang
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $barangManager->hapusBarang($id);
    $_SESSION['message'] = "Barang berhasil dihapus!";
    header('Location: databarang.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Barang</title>
    <style>
        /* Reset Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

    /* Body Styles */
    body {
        font-family: 'Arial', sans-serif;
        background: #f4f4f9;
        color: #333;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    /* Button Kembali */
    .btn-back {
        display: inline-block;
        margin-bottom: 20px;
        text-decoration: none;
        color: white;
        background: #007bff;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        font-size: 14px;
        transition: background 0.3s;
    }

    .btn-back:hover {
        background: #0056b3;
    }

    /* Container Styles */
    .container {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        max-width: 700px;
        width: 100%;
    }

    /* Heading Styles */
    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
        font-size: 24px;
    }

    /* Notifikasi */
    .message {
        background-color: #e6ffe6;
        color: #2b8a3e;
        border: 1px solid #a3d4a7;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
        text-align: center;
        font-size: 14px;
    }

    /* Form Styles */
    form {
        margin-bottom: 20px;
    }

    form div {
        margin-bottom: 15px;
    }

    form label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    form input, form button {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    form button {
        background: #007bff;
        color: white;
        border: none;
        font-weight: bold;
        transition: background 0.3s;
    }

    form button:hover {
        background: #0056b3;
    }

    /* Table Styles */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th, table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }

    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    /* Tombol Aksi */
    .btn-delete {
        background: #dc3545;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 12px;
        transition: background 0.3s;
    }

    .btn-delete:hover {
        background: #a71d2a;
    }
    </style>
</head>
<body>
    <!-- Tombol Kembali -->
    <a href="index.php" class="btn-back">Kembali ke Dashboard</a>

    <!-- Kontainer Utama -->
    <div class="container">
        <h1>Pencatatan Barang</h1>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="message">
                <?= $_SESSION['message']; ?>
                <?php unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div>
                <label for="nama">Nama Barang:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div>
                <label for="harga">Harga Barang:</label>
                <input type="number" id="harga" name="harga" required>
            </div>
            <div>
                <label for="stok">Stok Barang:</label>
                <input type="number" id="stok" name="stok" required>
            </div>
            <button type="submit" name="tambah">Tambah Barang</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barangManager->getBarang() as $barang): ?> 
                    <tr>
                        <td><?= $barang['id'] ?></td>
                        <td><?= $barang['nama'] ?></td>
                        <td><?= $barang['harga'] ?></td>
                        <td><?= $barang['stok'] ?></td>
                        <td>
                            <a href="?hapus=<?= $barang['id'] ?>" class="btn-delete">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>