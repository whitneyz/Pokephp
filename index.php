<?php

declare(strict_types=1);

ini_set ("display_errors","1");
ini_set("display_startup_errors","1");
error_reporting(E_ALL);

//variables
$pokName = $_GET["inputValue"];


//todo does var_dump comes after the variables?

// to fetch data use file_get_contents
//file_get_contents ( string $filename [, bool $use_include_path = FALSE [, resource $context [, int $offset = 0 [, int $maxlen ]]]] ) : string
//Name
if(isset($pokName)){
    $pokeIndex = file_get_contents("https://pokeapi.co/api/v2/pokemon/$pokName");
    $data =json_decode($pokeIndex, true);
    echo $data;
} else {
    $pokName = '';
}
var_dump($data);
//ID


// moet van de ene pokemon naar de andere kunnen gaan op basis van id of naam

//html code if condition is true
// dus als id is 1 dan tonen we pokemon 1??? en dan door de array met een loop om de volgende ID te vinden
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="get">
    <input type="text" name="inputValue">
    <input type="submit" value="click">
</form>
<?php
echo $data["name"];
?>
<?php
echo $data["id"];

?>
<img src="<?php echo $data["sprites"]["front_default"] ?>" alt="">


</body>
</html>
