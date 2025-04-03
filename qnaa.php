<?php
// Načítanie triedy QnA
require_once 'QnA.php';

// Vytvorenie inštancie triedy QnA
$qna = new QnA();

// Spracovanie formulára na pridanie otázky a odpovede
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otazka = $_POST['otazka'];
    $odpoved = $_POST['odpoved'];

    // SQL dotaz na vloženie otázky a odpovede
    $sql = "INSERT INTO qna (otazka, odpoved) VALUES ('$otazka', '$odpoved')";

    if ($qna->getConn()->query($sql) === TRUE) {
        echo "Nová otázka bola úspešne pridaná!";
    } else {
        echo "Chyba pri pridávaní otázky: " . $qna->getConn()->error;
    }
}
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pridať otázku a odpoveď</title>
</head>
<body>

    <h1>Pridajte novú otázku a odpoveď</h1>
    <form action="qnaa.php" method="post">
        <label for="otazka">Otázka:</label><br>
        <textarea name="otazka" id="otazka" rows="4" cols="50"></textarea><br><br>

        <label for="odpoved">Odpoveď:</label><br>
        <textarea name="odpoved" id="odpoved" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Pridať">
    </form>

</body>
</html>
