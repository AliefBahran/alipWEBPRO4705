<?php
session_start();

// Inisialisasi array buku dalam sesi jika belum ada
if (!isset($_SESSION['buku'])) {
    $_SESSION['buku'] = [];
}

// Menampilkan data buku
function tampil_data($buku) {
    echo "<h3>Data Buku:</h3><table border='1'><tr><th>ID</th><th>Judul</th><th>Penulis</th></tr>";
    foreach ($buku as $index => $item) {
        echo "<tr><td>" . ($index + 1) . "</td><td>{$item['judul']}</td><td>{$item['penulis']}</td></tr>";
    }
    echo "</table>";
}

// Menambah buku
function tambah_buku(&$buku, $judul, $penulis) {
    $buku[] = ["judul" => $judul, "penulis" => $penulis];
    echo "Buku '$judul' ditambahkan!<br><br>";
}

// Menghapus buku
function hapus_buku(&$buku, $id) {
    if (isset($buku[$id - 1])) {
        array_splice($buku, $id - 1, 1);
        echo "Buku ID $id dihapus!<br><br>";
    } else {
        echo "ID tidak valid!<br><br>";
    }
}

// Mengedit buku
function edit_buku(&$buku, $id, $judul, $penulis) {
    if (isset($buku[$id - 1])) {
        $buku[$id - 1] = ["judul" => $judul, "penulis" => $penulis];
        echo "Buku ID $id diperbarui!<br><br>";
    } else {
        echo "ID tidak valid!<br><br>";
    }
}

// Mencari buku
function cari_buku($buku, $keyword) {
    echo "<h3>Pencarian untuk '$keyword':</h3>";
    $found = false;
    foreach ($buku as $item) {
        if (stripos($item['judul'], $keyword) !== false) {
            echo "Judul: {$item['judul']}, Penulis: {$item['penulis']}<br>";
            $found = true;
        }
    }
    if (!$found) echo "Buku tidak ditemukan.<br><br>";
}

// Proses interaksi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['tambah'])) {
        tambah_buku($_SESSION['buku'], $_POST['judul'], $_POST['penulis']);
    } elseif (isset($_POST['hapus'])) {
        hapus_buku($_SESSION['buku'], $_POST['id_buku']);
    } elseif (isset($_POST['edit'])) {
        edit_buku($_SESSION['buku'], $_POST['id_buku'], $_POST['judul_baru'], $_POST['penulis_baru']);
    } elseif (isset($_POST['cari'])) {
        cari_buku($_SESSION['buku'], $_POST['keyword']);
    }
}

tampil_data($_SESSION['buku']);
?>

<h3>Tambah Buku</h3>
<form method="post">
    Judul: <input type="text" name="judul" required>
    Penulis: <input type="text" name="penulis" required>
    <input type="submit" name="tambah" value="Tambah">
</form>

<h3>Hapus Buku</h3>
<form method="post">
    ID Buku: <input type="number" name="id_buku" required>
    <input type="submit" name="hapus" value="Hapus">
</form>

<h3>Edit Buku</h3>
<form method="post">
    ID Buku: <input type="number" name="id_buku" required><br> <br>
    Judul Baru: <input type="text" name="judul_baru" required>
    Penulis Baru: <input type="text" name="penulis_baru" required>
    <input type="submit" name="edit" value="Edit">
</form>

<h3>Cari Buku</h3>
<form method="post">
    Kata Kunci: <input type="text" name="keyword" required>
    <input type="submit" name="cari" value="Cari">
</form>