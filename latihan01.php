<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian Buah</title>
</head>
<body>

<h2>Form Pembelian Buah</h2>
<form method="post" action="">
    <label for="nama_buah">Masukkan nama buah yang ingin dibeli (apel, pisang, mangga):</label><br>
    <input type="text" id="nama_buah" name="nama_buah" required><br><br>

    <label for="jumlah_buah">Masukkan jumlah buah yang ingin dibeli:</label><br>
    <input type="number" id="jumlah_buah" name="jumlah_buah" min="1" required><br><br>

    <input type="submit" value="Hitung">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $daftar_buah = array("apel" => 10000, "pisang" => 5000, "mangga" => 15000);

    function cekKetersediaanBuah($buah, $daftar_buah) {
        return isset($daftar_buah[$buah]);
    }

    function hitungTotalHarga($buah, $jumlah, $daftar_buah) {
        return $daftar_buah[$buah] * $jumlah;
    }

    $nama_buah = strtolower(trim($_POST['nama_buah']));
    $jumlah_buah = intval(trim($_POST['jumlah_buah']));

    if (cekKetersediaanBuah($nama_buah, $daftar_buah)) {
        $total_harga = hitungTotalHarga($nama_buah, $jumlah_buah, $daftar_buah);
        $diskon = 0.1 * $total_harga;
        $total_akhir = ($total_harga - $diskon);

        echo "<p>Total harga normal untuk $jumlah_buah $nama_buah adalah: Rp " . number_format($total_harga) . "</p>";
        echo "<p>Total harga setelah diskon untuk $jumlah_buah $nama_buah adalah: Rp " . number_format($total_akhir) . "</p>";
    } else {
        echo "<p>Buah tidak tersedia.</p>";
    }
}    


?>

</body>
</html>
