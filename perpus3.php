<?php
// Inisialisasi array buku
$buku = [
    ["judul" => "Berserk", "penulis" => "Miura Kentaro"],
    ["judul" => "Oswald", "penulis" => "Walt Disney"]
];

// Fungsi untuk menampilkan data buku
function tampilBuku($buku) {
    echo "<table border='1'>";
    echo "<tr><th>Judul</th><th>Penulis</th></tr>";
    foreach ($buku as $b) {
        echo "<tr><td>{$b['judul']}</td><td>{$b['penulis']}</td></tr>";
    }
    echo "</table>";
}

// Fungsi untuk menambah buku baru
function tambahBuku(&$buku, $judul, $penulis) {
    $buku[] = ["judul" => $judul, "penulis" => $penulis];
}

// Fungsi untuk mengedit buku berdasarkan ID
function editBuku(&$buku, $id, $judulBaru, $penulisBaru) {
    if (isset($buku[$id])) {
        $buku[$id] = ["judul" => $judulBaru, "penulis" => $penulisBaru];
    }
}

// Fungsi untuk menghapus buku berdasarkan ID
function hapusBuku(&$buku, $id) {
    if (isset($buku[$id])) {
        unset($buku[$id]);
        $buku = array_values($buku); // Reindex array
    }
}

// Fungsi untuk mencari buku berdasarkan kata kunci
function cariBuku($buku, $kataKunci) {
    $hasilCari = [];
    foreach ($buku as $b) {
        if (strpos(strtolower($b['judul']), strtolower($kataKunci)) !== false ||
            strpos(strtolower($b['penulis']), strtolower($kataKunci)) !== false) {
            $hasilCari[] = $b;
        }
    }
    return $hasilCari;
}

// Menampilkan data awal
echo "<h3>Menampilkan Data Awal:</h3>";
tampilBuku($buku);

// Menambah buku baru
tambahBuku($buku, "One Piece", "Eiichiro Oda");
echo "<h3>Menambah Buku Baru:</h3>";
tampilBuku($buku);

// Mengedit buku dengan ID 2 (Oswald)
editBuku($buku, 2, "Naruto", "Masashi Kishimoto");
echo "<h3>Memperbarui Buku dengan ID ke-2:</h3>";
tampilBuku($buku);

// Menghapus buku dengan ID 1 (Berserk)
hapusBuku($buku, 1);
echo "<h3>Menghapus Buku dengan ID ke-1:</h3>";
tampilBuku($buku);

// Mencari buku dengan kata kunci "Naruto"
$hasilCari = cariBuku($buku, "Naruto");
echo "<h3>Mencari Buku dengan kata kunci 'Naruto':</h3>";
tampilBuku($hasilCari);
?>