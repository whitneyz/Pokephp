<?php

declare(strict_types=1);

ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

//variables
$pokName = $_GET["inputValue"];
$pokEvolution = $_GET["inputValue"];


// to fetch data use file_get_contents
//file_get_contents ( string $filename [, bool $use_include_path = FALSE [, resource $context [, int $offset = 0 [, int $maxlen ]]]] ) : string
//Name
if (isset($pokName)) {
    $pokeIndex = file_get_contents("https://pokeapi.co/api/v2/pokemon/" . $pokName);
    $data = json_decode($pokeIndex, true);
    echo $data;
} else {
    $pokName = '';
}

//moves: there are more than 1 moves so try to make a loop for the moves
//loop 4 times through array with random number

//var_dump($data);
$allMoves = $data["moves"];
$randomMoves = selectMoves($allMoves);



function selectMoves($moves){
    $fourMoves = "";
    for ($i = 0; $i < 4; $i++) {
        $randomNumber = rand(0,count($moves));//rand ( int $min , int $max ) : int
        $fourMoves .= $moves[$randomNumber]["move"]["name"];
    }
//todo  pas op voor Ditto is een speciale heeft maar een move (aparte functie?)
    return $fourMoves;
}

if(isset($pokEvolution)) {
    $pokeIndex2 = file_get_contents("https://pokeapi.co/api/v2/evolution-chain//" . $pokEvolution);
    $data2 = json_decode($pokeIndex2, true);
    echo $data2;
} else {
    $pokEvolution = '';
    }
$evolutions = $data2[""]

/* do while loop you want to loop through block of code as long as there are evolutions
 condition true: as long as there are evolutions

do {
    //code;
} while ();*/
//todo voor evolution eerst loop daarna in poke evolution een string krijgen voor alle pokemon op een rijtje
// left right buttons moet van de ene pokemon naar de andere kunnen gaan op basis van id of naam

//extreme challenge: indexpage to show first 20 pokemon on first page, second 20 on next page etc
//todo overview page is the page with all their features
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<form action="" method="get">
    <input type="text" name="inputValue">
    <input type="submit" value="click">
</form>

<div class="row">
    <div class="col-sm-4">.col-sm-4</div>
    <div class="col-sm-4">.col-sm-4</div>
    <div class="col-sm-4">.col-sm-4</div>
</div>
<nav aria-label="...">
    <ul class="pagination">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav>
<?php
echo $data["name"];
?>
<?php
echo $data["id"];
?>
<?php
//echo $data["moves"]["0"]["move"]["name"];
echo $randomMoves;
?>
<img src="<?php echo $data["sprites"]["front_default"] ?>" alt="">
<?php
echo $data2;
?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>

</body>
</html>
