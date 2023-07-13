<?php
    require 'controller.php';
    $box = query("SELECT * FROM tbl_pelanggan ORDER BY id_pelanggan DESC");

    if( isset($_POST["submit"]) ){
        
        if( input($_POST) > 0 ){
            echo "<script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'index.php';
                </script>";
        }else{
            echo "<script>
                    alert('data gagal ditambahkan');
                    document.location.href = 'index.php';
                </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koneksi ke Database</title>
</head>
<body>

    <h1>Menu</h1>
    <ul>
        <li><a href="#">Input Data Pelanggan</a></li>
        <li><a href="input-data-pesanan.php">Input Data Pesanan</a></li>
    </ul>

    <h2>Form Input Pelanggan</h2>
    <form action="" method="POST">
        <label for="id_pelanggan">ID Pelanggan:</label>
        <input type="number" name="id_pelanggan" required><br>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" required><br>

        <label for="no_telp">No. Telepon:</label>
        <input type="number" name="no_telp" required><br>

        <input type="submit" name="submit" value="Simpan">
    </form>

    <a href="input-data.php">tambah data siswa</a>

    <table border="1">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. Telp</th>
            <th>Aksi</th>
        </tr>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach( $box as $item ) { ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $item["nama"] ?></td>
                <td><?= $item["alamat"] ?></td>
                <td><?= $item["no_telp"] ?></td>
                <td>
                    <a href="delete.php?id_pelanggan=<?= $item["id_pelanggan"] ?>">hapus</a>
                    |
                    <a href="update.php?id_pelanggan=<?= $item["id_pelanggan"] ?>">ubah</a>
                </td>
            </tr>
            <?php $i++ ?>
            <?php } ?>
        </tbody>
    </table>
    
</body>
</html>