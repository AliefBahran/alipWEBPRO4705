<?php

$buku = [
    ["id" => 1, 
    "judul" => "Pemrograman PHP", 
    "pengarang" => "Budi"],

    ["id" => 2,
    "judul" => "Belajar JavaScript",
    "pengarang" => "Andi"],
];

function tampilData($buku) {
    if (count($buku) > 0) {
        echo "<table border='3' cellpadding='10' cellspacing='0'>";
        echo "<tr>
        <th>Judul</th>
        <th>Pengarang</th>
        </tr>";
        foreach ($buku as $b) {
            echo "<tr>";
            echo "<td>" . $b['judul'] . "</td>";
            echo "<td>" . $b['pengarang'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data buku.<br>";
    }
    echo "<br>";
}
tampilData($buku);

function insert(&$buku, $judul, $pengarang) {
    $id = end($buku)['id'] + 1;  
    $buku[] = [
        "id" => $id,
        "judul" => $judul,
        "pengarang" => $pengarang
    ];
    echo "Buku berhasil ditambahkan.<br>";
}
insert($buku, "Mastering Python", "Charlie");
tampilData($buku);

function editData(&$buku, $id, $judul, $pengarang) {
    foreach ($buku as &$b) {
        if ($b['id'] == $id) {
            $b['judul'] = $judul;
            $b['pengarang'] = $pengarang;
            echo "Buku dengan ID $id berhasil diubah.<br>";
            return;
        }
    }
    echo "Buku dengan ID $id tidak ditemukan.<br>";
}
editData($buku, 2, "Panji Petualang", "Mas Panji");
tampilData($buku);

function hapusData(&$buku, $id) {
    foreach ($buku as $book => $b) {
        if ($b['id'] == $id) {
            unset($buku[$book]);
            echo "Buku dengan ID $id berhasil dihapus.<br>";
            return;
        }
    }
    echo "Buku dengan ID $id tidak ditemukan.<br>";
}
hapusData($buku, 1);
tampilData($buku);

function cariData($buku, $judul) {
    $hasil = [];
    foreach ($buku as $b) {
        if (stripos($b['judul'], $judul) !== false) {
            $hasil[] = $b;
        }
    }
    if (count($hasil) > 0) {
        echo "Hasil pencarian untuk judul '$judul':<br>";
        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        echo "<tr><th>Judul</th><th>Pengarang</th></tr>";
        foreach ($hasil as $b) {
            echo "<tr>";
            echo "<td>" . $b['judul'] . "</td>";
            echo "<td>" . $b['pengarang'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Buku dengan judul '$judul' tidak ditemukan.<br>";
    }
    echo "<br>";
}
cariData($buku, "Python");

?>
