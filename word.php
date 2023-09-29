<?php
session_start();
$words = [
    "Tijgerprint",
    "Paraplu",
    "Toverstaf",
    "Bloemenveld",
    "Krokodil",
    "Watermeloen",
    "Zonsopgang",
    "Gitaarmuziek",
    "Tropisch",
    "Kastanjebruin",
    "Puzzelstukje",
    "Fietspad",
    "Avontuurlijk",
    "Schaduwrijk",
    "Hoogtepunt",
    "Sneeuwvlok",
    "Oceaanbries",
    "Appelboom",
    "Woestijnzand",
    "Regenboog",
    "Vogelnest",
    "Donderwolk",
    "Picknick",
    "Schommelstoel",
    "Zonneschijn",
    "Vuurwerk",
    "Herfstblad",
    "Wintersport",
    "Tropenhitte",
    "Zonnebloem"
];
$randomWord = $words[array_rand($words)];

if (!empty($_POST)) {
    if (isset($_POST['word'])) {
        $_SESSION['chosenWord'] = strtoupper(trim($_POST['word']));
    }

    if (isset($_POST['randomWord'])) {
        $_SESSION['chosenWord'] = strtoupper($randomWord);
    }

    header('location:galgje.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/output.css">
    <title>Glagje</title>
</head>

<body class="bg-gradient-to-r from-amber-400 to-amber-700">
    <div class="mx-auto w-fit bg-black rounded text-white bg-opacity-30 px-5 py-3 mt-10">
        <h1 class="text-center font-bold text-4xl">Galgje</h1>
        <h2 class="text-center font-semibold text-3xl py-4">Kies een eigen woord of krijg een willekeurige</h2>
        <div class="flex justify-between">
            <form action="#" method="POST">
                <label for="word"></label>
                <input type="text" id="word" name="word" class="rounded text-black px-1" required>
                <input type="submit" class="bg-white text-amber-950 px-2 py-0.5 rounded" value="Eigen woord">
            </form>
            <form action="#" method="POST">
                <input type="hidden" name="randomWord">
                <input type="submit" class="bg-white text-amber-950 px-2 py-0.5 rounded" value="Willekeurig woord">
            </form>
        </div>
    </div>
</body>

</html>