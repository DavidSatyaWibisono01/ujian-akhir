<?php
    require 'controller.php';

    $id_pelanggan = $_GET["id_pelanggan"];
    $item = query("SELECT * FROM tbl_pelanggan WHERE id_pelanggan = $id_pelanggan")[0];

    if( isset($_POST["submit"]) ){
        
        if( update($_POST) > 0 ){
            echo "<script>
                    alert('data berhasil diubah');
                    document.location.href = 'index.php';
                </script>";
        }else{
            echo "<script>
                    alert('data gagal diubah');
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

    <h2>Form Ubah Data Pelanggan</h2>
    <form action="" method="POST">
        <input type="hidden" name="id_pelanggan" value="<?= $item["id_pelanggan"] ?>" required><br>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?= $item["nama"] ?>" required><br>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="<?= $item["alamat"] ?>" required><br>

        <label for="no_telp">No. Telepon:</label>
        <input type="number" name="no_telp" value="<?= $item["no_telp"] ?>" required><br>

        <button type="submit" name="submit">kirim</button>
    </form>
    
</body>
</html>