<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung rata-rata</title>
</head>
<body>
    <h2>Hitung rata-rata</h2>
    <form method="post" action="">
        <label for="a1">masukkan 1:</label> <br>
        <input type="number" id="a1" name="a1"> <br> <br>

        <label for="a2">masukkan 2:</label> <br>
        <input type="number" id="a2" name="a2"> <br> <br>

        <label for="a3">masukkan 3:</label> <br>
        <input type="number" id="a3" name="a3"> <br> <br>

        <label for="a4">masukkan 4:</label> <br>
        <input type="number" id="a4" name="a4"> <br> <br>

        <label for="a5">masukkan 5:</label> <br>
        <input type="number" id="a5" name="a5"> <br> <br>

        <input type="submit" value="Hitung">
    </form>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $a1 = intval(trim($_POST["a1"]));
    $a2 = intval(trim($_POST["a2"]));
    $a3 = intval(trim($_POST["a3"]));
    $a4 = intval(trim($_POST["a4"]));
    $a5 = intval(trim($_POST["a5"]));

    $total = ($a1 + $a2 + $a3 + $a4 + $a5) / 5;

    echo 'Hasil rata-rata anda :'. $total;
}
?>
</body>
</html>