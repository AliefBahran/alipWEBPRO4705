<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 4</title>
</head>
<body>
    <h3>Tambah Barang</h3>
    <form method="post" action="">
        <label for="nmBarang">Nama Barang</label><br>
        <input type="text" id="nmBarang" name="nmBarang" required><br>

        <label for="kategori">Kategori Barang</label><br>
        <input type="text" id="kategori" name="kategori" required><br>

        <label for="hrgBarang">Harga Barang</label><br>
        <input type="number" id="hrgBarang" name="hrgBarang" required><br><br>

        <input type="submit" value="Tambah">
    </form>

    <?php
    session_start();
    
    // array untuk menyimpan daftar barang
    if (!isset($_SESSION['daftar_barang'])) {
        $_SESSION['daftar_barang'] = [];
    }

    // Hapus barang 
    if (isset($_GET['hapus'])) {
        $index = intval($_GET['hapus']);
        if (isset($_SESSION['daftar_barang'][$index])) {
            unset($_SESSION['daftar_barang'][$index]);
            $_SESSION['daftar_barang'] = array_values($_SESSION['daftar_barang']); // Reindex array
        }
    }

    // apakah ada barang yang ingin diedit
    $edit_barang = null;
    $edit_index = null;

    if (isset($_GET['edit'])) {
        $edit_index = intval($_GET['edit']);
        if (isset($_SESSION['daftar_barang'][$edit_index])) {
            $edit_barang = $_SESSION['daftar_barang'][$edit_index];
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['edit_index'])) {

        $nama_barang = $_POST['nmBarang'];
        $kategori = $_POST['kategori'];
        $harga_barang = $_POST['hrgBarang'];

        $_SESSION['daftar_barang'][] = [
            'nama' => $nama_barang,
            'kategori' => $kategori,
            'harga' => $harga_barang,
        ];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_index'])) {
        $edit_index = intval($_POST['edit_index']);
        $nama_barang = $_POST['nmBarang'];
        $kategori = $_POST['kategori'];
        $harga_barang = $_POST['hrgBarang'];

        // Update barang yang ada
        $_SESSION['daftar_barang'][$edit_index] = [
            'nama' => $nama_barang,
            'kategori' => $kategori,
            'harga' => $harga_barang,
        ];
    }

    // Tampilkan daftar barang
    if (!empty($_SESSION['daftar_barang'])) {
        echo "<h3>Daftar Barang</h3>";
        echo "<table border='1'>
                <tr>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>";
        foreach ($_SESSION['daftar_barang'] as $index => $barang) {
            echo "<tr>
                    <td>{$barang['nama']}</td>
                    <td>{$barang['kategori']}</td>
                    <td>" . number_format($barang['harga'], 0, ',', '.') . "</td>
                    <td>
                        <a href='?hapus={$index}'>Hapus</a> | 
                        <a href='?edit={$index}'>Edit</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    }
    ?>

    <?php if ($edit_barang): ?>
        <h3>Edit Barang</h3>
        <form method="post" action="">
            <label for="nmBarang">Nama Barang</label><br>
            <input type="text" id="nmBarang" name="nmBarang" required value="<?php echo $edit_barang['nama']; ?>"><br>

            <label for="kategori">Kategori Barang</label><br>
            <input type="text" id="kategori" name="kategori" required value="<?php echo $edit_barang['kategori']; ?>"><br>

            <label for="hrgBarang">Harga Barang</label><br>
            <input type="number" id="hrgBarang" name="hrgBarang" required value="<?php echo $edit_barang['harga']; ?>"><br><br>

            <input type="hidden" name="edit_index" value="<?php echo $edit_index; ?>">
            <input type="submit" value="Edit">
        </form>
    <?php endif; ?>
    
</body>
</html>
