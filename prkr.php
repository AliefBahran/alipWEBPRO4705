<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parkir</title>
</head>
<body>
    <h2>Hitung Tarif Parkir</h2>
    <form method="post" action="">
        <label for="tipe">Masukkan tipe kendaraan kau:</label> <br> 
        <input type="text" id="tipe" name="tipe"> <br> <br>

        <label for="jam">Brp jam ko parkir:</label> <br> 
        <input type="number" id="jam" name="jam"> <br> <br>

        <input type="submit" value="Tarif">

    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipekendaraan = array("mobil" => 100000, "motor" => 50000);

    function cek($tipekendaraan, $tipe) {
        return isset($tipekendaraan[$tipe]);
    }

    function tarif($tipekendaraan, $jam, $tipe) {
        return ($tipekendaraan[$tipe]) * $jam;
    }

    $tipe = strtolower(trim($_POST["tipe"]));
    $jam = intval(trim($_POST["jam"]));

    if(cek($tipekendaraan, $tipe)) {
        $harga = tarif($tipekendaraan, $jam, $tipe); 
        echo "total tarif $tipe kau: ". number_format($harga);
    } else {
        echo "input sing bener";
    }
}
?>

</body>
</html>