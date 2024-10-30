(CODE VERSI 1) SOAL 3
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assesmen 1</title>
</head>
<body>
    <form method="post" action="">
        <label for="a">Pilih petarung tim A ("Andre", "Berli", "Charlie", "Desmond", "Erina"):</label> <br>
        <input type="text" id="a", name="a" required> <br>  <br>

        <label for="b">Pilih petarung tim B ("Farah", "Gerry", "Hesti", "Indra", "Jordan"):</label> <br>
        <input type="text" id="a", name="a" required> <br>  <br>

        <input type="submit" value="Tandingkan">
        </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tim_a = array("Andre" => 80, "Berli" => 75, "Charlie" => 67, "Desmond" => 88, "Erina" => 95);
        $tim_b = array("Farah" => 75, "Gerry" => 89, "Hesti" => 76, "Indra" => 61, "Jordan" => 96);

        function cek_a($tim_a, $a) {
            return isset($tim_a[$a]);
        }

        function cek_b($tim_b, $b) {
            return isset($tim_b[$b]);

        $a = strtolower(trim($_POST["a"]));
        $b = strtolower(trim($_POST["b"]));
        
        if (cek_a($tim_a, $a) and cek_b($tim_b, $b)) {
            if ($a > $b) {
                echo "Pemenang nya adalah $a";
            } else {
                echo"Pemenang nya adalah $b";
            }
        }
    }
}
?>
</body>
</html>
(CODE VERSI 2) SOAL 3

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
    <label for="a">Pilih petarung tim A ("Andre", "Berli", "Charlie", "Desmond", "Erina"):</label><br>
    <input type="text" id="a" name="a" required><br><br>

    <label for="aa">Masukkan total kekuatan ("80", "75", "67", "88", "95"):</label><br>
    <input type="number" id="aa" name="aa" min="1" required><br><br>

    <label for="b">Pilih petarung tim B ("Farah", "Gerry", "Hesti", "Indra", "Jordan"):</label><br>
    <input type="text" id="b" name="b" required><br><br>

    <label for="bb">Masukkan total kekuatan ("75", "89", "76", "61", "96"):</label><br>
    <input type="number" id="bb" name="bb" min="1" required><br><br>

    <input type="submit" value="Hitung">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $a = strtolower(trim($_POST['a']));
    $aa = intval(trim($_POST['aa']));
    $b = strtolower(trim($_POST['b']));
    $bb = intval(trim($_POST['bb']));

    if ($aa > $bb) {
        echo"Pemenang adalah $a";
    } else {
        echo"Pemenang adalah $b";
    }

} 

?>

</body>
</html>