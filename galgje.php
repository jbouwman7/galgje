<?php
session_start();

if (!isset($_SESSION['availableLetters'])) $_SESSION['availableLetters'] = range('A', 'Z');
$_SESSION['arrWord'] = str_split($_SESSION["chosenWord"]);
if (isset($_POST['chosenLetter'])) $_SESSION['chosenLetter'] = $_POST['chosenLetter'];

$correctLetters = [];
$i = 0;
if (isset($_SESSION['chosenLetter'])) {
    foreach ($_SESSION['arrWord'] as $letter) {
        $i++;
        if ($letter == $_SESSION['chosenLetter']) {
            $correctLetters[$i] = $_SESSION['chosenLetter'];
        }
    }
}

// remove letter from chosenLetters
if (isset($_POST["chosenLetter"])) {
    $key = array_search($_SESSION["chosenLetter"], $_SESSION['availableLetters']);
    unset($_SESSION['availableLetters'][$key]);
    $_SESSION['availableLetters'] = array_values($_SESSION['availableLetters']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/output.css">
    <title>Galgje</title>
</head>

<body class="bg-gradient-to-r from-amber-400 to-amber-700">
    <div class="mx-auto w-fit">
        <form action="" method="post" class="flex gap-x-3 w-fit">
            <?php foreach ($_SESSION['availableLetters'] as $key => $aLetter) : ?>
                <input type="submit" name="chosenLetter" value="<?= $aLetter ?>" id="<?= $aLetter ?>" class="hover:cursor-pointer hover:underline font-bold">
            <?php endforeach ?>
        </form>
    </div>

</body>

</html>