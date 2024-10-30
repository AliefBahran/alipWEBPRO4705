<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktorial</title>
</head>
<body>
    <h2>Hitung Faktorial</h2>
    <form method="post" action="">
        <label for="a">Masukkan Angka :</label> <br>
        <input type="number" id="a" name="a"> <br> <br>

        <input type="submit" value="Hitung">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function faktorial($a) {
        if ($a <= 1) {
            return 1;
        } else { 
            return ($a) * faktorial($a - 1);
        }
    }

    $a = intval(trim($_POST["a"]));
    $hasil = faktorial($a);

    echo "faktorial dari $a adalah :", number_format($hasil);
}
?>
</body>
</html>