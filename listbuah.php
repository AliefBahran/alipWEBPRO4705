<?php

$daftar_buah = array( "apel" => 10000, "pisang" => 5000, "mangga" => 15000);

function cekKetersediaanBuah($buah, $daftar_buah) {
    return isset($daftar_buah[$buah]);
}

function hitungTotalHarga($buah, $jumlah, $daftar_buah) {
    return $daftar_buah[$buah] * $jumlah;
}

$nama_buah = readline ("Masukkan nama buah yang ingin dibeli (apel, pisang, mangga): ");

if (cekKetersediaanBuah($nama_buah, $daftar_buah)) {

    $jumlah_buah = readline ("Masukkan jumlah buah yang ingin dibeli: ");
    $total_harga = hitungTotalHarga($nama_buah, $jumlah_buah, $daftar_buah);
    $diskon = 0.1 * $total_harga;
    $total_akhir = ($total_harga - $diskon);

   echo "Total harga normal untuk $jumlah_buah $nama_buah adalah: Rp " , number_format($total_harga). "\n";
   echo "Total harga setelah diskon untuk $jumlah_buah $nama_buah adalah: Rp ", number_format($total_akhir). "\n";
} else {

    echo "Buah tidak tersedia";
}
?>