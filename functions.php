<?php
function getCards(int $number, array $choices){
    $numbers = range(0, 77);
    shuffle($numbers);
    $cards = array_slice($numbers, 0, $number);
    $chosen = [];
    $k = 0;
    foreach($cards as $i){
        $chosen[$k] = $choices[$i];
        $k+=1;
    }
    return $chosen;
}

function getOrientations(int $number){
    $orientations = [];
    for($i = 0; $i < $number; $i++){
        $orientations[$i] = rand(0,1);
    }
    return $orientations;
}

function printImage(array $orientation, array $reading, int $card){
    if($orientation[$card] == 0)
            echo "<td><img src=\"./cards/".$reading[$card]->img."\" alt=\"".$reading[$card]->name."\"><p>".$reading[$card]->name."</p></td>";
    else {
        echo "<td><img id=\"reverse\" src=\"./cards/".$reading[$card]->img."\" alt=\"".$reading[$card]->name."\"><p id=\"reverse\">".$reading[$card]->name."</p></td>";
    }
}

function printMeaning(array $orientation, array $reading, int $card){
    if($orientation[$card] == 0) {
        echo "MEANING: ".$reading[$card]->meaning_up;
    } else {
        echo "MEANING IN REVERSE: ".$reading[$card]->meaning_rev;
    }
}
?>