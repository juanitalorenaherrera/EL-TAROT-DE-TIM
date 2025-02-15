<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	background-image: url();
}
-->
</style></head>

<body>
<p><img src="Imagen2.png" width="1492" height="295" /></p>
<form id="myform" method="post" action="TAROT_TIM.php">
        <label for="spread">Spread:</label>
        <select name="spread" id="spread">
            <option value="one">One Card</option>
            <option value="three">Three Card</option>
            <option value="five">Five Card</option>
            <option value="horse">Horseshoe</option>
            <option value="tree">Tree of Life</option>
        </select>
        <input type="submit" value="Get Reading" id="read">
</form>


<?php

require_once 'functions.php';
if(empty($_POST)){ //if the user has not submited choices no questions will be shown
    echo "<p>Awaiting choices...</p></body></html>";
} else {
    $file = file_get_contents("tarot-deck.json");
    $placeholder = json_decode($file);
    $deck = $placeholder->cards;
    echo "<div id=\"tables\">";
    switch($_POST["spread"]){
        case "one":
            require_once 'one.php';
            break;
        case "three":
            require_once 'three.php';
            break;
        case "five":
            require_once 'five.php';
            break;
        case "horse":
            require_once 'horse.php';
            break;
        case "tree":
            require_once 'tree.php';
            break;
        default:
            echo "<p>not added yet...</p>";
    }
    echo "</div>";
}
?>
</body>
</html>
