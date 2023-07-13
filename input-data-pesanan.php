<?php
include 'controller.php';

if (isset($_POST['submit'])) {
    $kode_pesanan = $_POST['kode_pesanan'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $tanggal = $_POST['tanggal'];
    $harga_paket = $_POST['harga_paket'];
    $berat_paket = $_POST['berat_paket'];
    $total_biaya = $harga_paket * $berat_paket;
    $status = $_POST['status'];

    $query = "INSERT INTO tbl_pesanan (kode_pesanan, id_pelanggan, tanggal, Harga_paket, berat_paket, Total_biaya, Status)
              VALUES ('$kode_pesanan', '$id_pelanggan', '$tanggal', '$harga_paket', '$berat_paket', '$total_biaya', '$status')";

    if (mysqli_query($conn, $query)) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

$query = "SELECT * FROM tbl_pesanan";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Input Pesanan</title>
</head>
<body>

    <h1>Menu</h1>
    <ul>
        <li><a href="index.php">Input Data Pelanggan</a></li>
        <li><a href="#">Input Data Pesanan</a></li>
    </ul>

    <h2>Form Input Pesanan</h2>
    <form action="" method="POST">
        <label for="kode_pesanan">Kode Pesanan:</label>
        <input type="text" name="kode_pesanan" required><br>

        <label for="id_pelanggan">ID Pelanggan:</label>
        <input type="text" name="id_pelanggan" required><br>

        <label for="tanggal">Tanggal:</label>
        <input type="text" name="tanggal" required><br>

        <label for="harga_paket">Harga Paket:</label>
        <select name="harga_paket" required>
            <option value="7000">Personal</option>
            <option value="8000">Keluarga</option>
            <option value="10000">Business</option>
        </select><br>

        <label for="berat_paket">Berat Paket:</label>
        <input type="text" name="berat_paket" required><br>

        <label for="status">Status:</label>
        <input type="text" name="status" required><br>

        <input type="submit" name="submit" value="Simpan">
    </form>
    <h2>Data Pesanan</h2>
    <table border="1">
        <tr>
            <th>Kode Pesanan</th>
            <th>ID Pelanggan</th>
            <th>Tanggal</th>
            <th>Harga Paket</th>
            <th>Berat Paket</th>
            <th>Total Biaya</th>
            <th>Status</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['kode_pesanan']; ?></td>
                <td><?= $row['id_pelanggan']; ?></td>
                <td><?= $row['tanggal']; ?></td>
                <td><?= $row['harga_paket']; ?></td>
                <td><?= $row['berat_paket']; ?></td>
                <td><?= $row['total_biaya']; ?></td>
                <td><?= $row['status']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
