<?php
$daftar = array("Alief" => 70, "mika" => 65, "Jauza" => 80);
$nilaitertinggi = max($daftar);
$namatertinggi = array_search($nilaitertinggi, $daftar);

echo "Peraih nilai tertinggi ialah ", $namatertinggi;