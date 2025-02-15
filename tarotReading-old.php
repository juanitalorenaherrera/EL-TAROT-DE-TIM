<?php
echo <<<_HEADER
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="tarotStyle.css">
        <title>Tarot Reading</title>
    </head>
_HEADER;

echo <<<_CHOICE
<body>
    <section id="myheader">
        <h1>Tarot Reading</h1>
    </section>
    <form id="myform" method="post" action="tarotReading-old.php">
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
_CHOICE;
if(empty($_POST)){ //if the user has not submited choices no questions will be shown
    echo "<p>Awaiting choices...</p>";
} else {
    echo "<div id=\"tables\">";
    $file = file_get_contents("tarot-deck.json");
    $placeholder = json_decode($file);
    $deck = $placeholder->cards;
    switch($_POST["spread"]) {
        case "one":
                $reading = getCards(1, $deck);
                $orientation = rand(0,1);
                echo "<table>
                    <tr>
                        <th>WHAT TO KEEP IN MIND</th>
                    </tr>
                    <tr>
                        <td><img src=\"./cards/".$reading[0]->img."\"><p>".$reading[0]->name."</p></td>
                    </tr>
                    <tr>
                        <td>";
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[0]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[0]->meaning_rev;
                        }   
                echo "</td>
                    </tr>
                </table>";
            break;
        case "three":
                $reading = getCards(3,$deck);
                echo "<table>
                    <tr>
                        <th>PAST</th>
                        <th>PRESENT</th>
                        <th>FUTURE</th>
                    </tr>
                    <tr>
                        <td><img src=\"./cards/".$reading[0]->img."\"><p>".$reading[0]->name."</p></td>
                        <td><img src=\"./cards/".$reading[1]->img."\"><p>".$reading[1]->name."</p></td>
                        <td><img src=\"./cards/".$reading[2]->img."\"><p>".$reading[2]->name."</p></td>
                    </tr>
                    <tr>
                        <td>";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[0]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[0]->meaning_rev;
                        }   
                        echo "</td>
                        <td>";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[1]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[1]->meaning_rev;
                        } 
                        echo "</td>
                        <td>";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[2]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[2]->meaning_rev;
                        } 
                echo "</td>
                    </tr>
                </table>";
            break;
        case "five":
                $reading = getCards(5, $deck);
                echo "<table>
                    <tr>
                        <th>PAST AND HOW IT LED TO THE PRESENT</th>
                        <th>PRESENT</th>
                        <th>HIDDEN INFLUENCES ON THE PRESENT</th>
                        <th>ADVICE</th>
                        <th>OUTCOME</th>
                    </tr>
                    <tr>
                        <td><img src=\"./cards/".$reading[0]->img."\"><p>".$reading[0]->name."</p></td>
                        <td><img src=\"./cards/".$reading[1]->img."\"><p>".$reading[1]->name."</p></td>
                        <td><img src=\"./cards/".$reading[2]->img."\"><p>".$reading[2]->name."</p></td>
                        <td><img src=\"./cards/".$reading[3]->img."\"><p>".$reading[3]->name."</p></td>
                        <td><img src=\"./cards/".$reading[4]->img."\"><p>".$reading[4]->name."</p></td>
                    </tr>
                    <tr>
                        <td>";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[0]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[0]->meaning_rev;
                        }   
                        echo "</td>
                        <td>";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[1]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[1]->meaning_rev;
                        } 
                        echo "</td>
                        <td>";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[2]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[2]->meaning_rev;
                        } 
                        echo "</td>
                        <td>";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[3]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[3]->meaning_rev;
                        } 
                        echo "</td>
                        <td>";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[4]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[4]->meaning_rev;
                        } 
                echo "</td>
                    </tr>
                </table>";
            break;
        case "horse":
            $reading = getCards(7, $deck);
                echo "<table id=\"horse\">
                    <tr>
                        <td id=\"horse\"></td>
                        <td id=\"horse\"></td>
                        <th id=\"stuff\">OBSTACLES</th>
                        <td id=\"horse\"></td>
                        <td id=\"horse\"></td>
                    </tr>
                    <tr>
                        <td id=\"horse\"></td>
                        <th id=\"stuff\">HIDDEN INFLUENCES</th>
                        <td><img src=\"./cards/".$reading[3]->img."\"><p>".$reading[3]->name."</p></td>
                        <th id=\"stuff\">OUTSIDE INFLUENCES</th>
                        <td id=\"horse\"></td>
                    </tr>
                    <tr>
                        <th id=\"stuff\">PRESENT</th>
                        <td><img src=\"./cards/".$reading[2]->img."\"><p>".$reading[2]->name."</p></td>
                        <td id=\"stuff\">";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[3]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[3]->meaning_rev;
                        } 
                        echo "</td>
                        <td><img src=\"./cards/".$reading[4]->img."\"><p>".$reading[4]->name."</p></td>
                        <th id=\"stuff\">SOLUTION</th>
                    </tr>
                    <tr>
                        <td><img src=\"./cards/".$reading[1]->img."\"><p>".$reading[1]->name."</p></td>
                        <td id=\"stuff\">";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[2]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[2]->meaning_rev;
                        } 
                        echo "</td>
                        <td id=\"horse\"></td>
                        <td id=\"stuff\">";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[4]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[4]->meaning_rev;
                        } 
                        echo "</td>
                        <td><img src=\"./cards/".$reading[5]->img."\"><p>".$reading[5]->name."</p></td>
                    </tr>
                    <tr>
                        <td id=\"stuff\">";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[1]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[1]->meaning_rev;
                        } 
                        echo "</td>
                        <td id=\"horse\"></td>
                        <td id=\"horse\"></td>
                        <td id=\"horse\"></td>
                        <td id=\"stuff\">";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[5]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[5]->meaning_rev;
                        } 
                        echo "</td>
                    </tr>
                    <tr>
                    <th id=\"stuff\">PAST AND HOW IT LED TO THIS PROBLEM</th>
                        <td id=\"horse\"></td>
                        <td id=\"horse\"></td>
                        <td id=\"horse\"></td>
                        <th id=\"stuff\">OUTCOME</th>
                    </tr>
                    <tr>
                        <td><img src=\"./cards/".$reading[0]->img."\"><p>".$reading[0]->name."</p></td>
                        <td id=\"horse\"></td>
                        <td id=\"horse\"></td>
                        <td id=\"horse\"></td>
                        <td><img src=\"./cards/".$reading[6]->img."\"><p>".$reading[6]->name."</p></td>
                    </tr>
                    <tr>
                        <td id=\"stuff\">";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[0]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[0]->meaning_rev;
                        } 
                        echo "</td>
                        <td id=\"horse\"></td>
                        <td id=\"horse\"></td>
                        <td id=\"horse\"></td>
                        <td id=\"stuff\">";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[6]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[6]->meaning_rev;
                        } 
                        echo "</td>
                    </tr>
                    </table>";
            break; 
        case "tree":
            $reading = getCards(10, $deck);
                echo "<table id=\"horse\">
                    <tr>
                        <td id=\"horse\"></td>
                        <th id=\"stuff\">PRESENT</th>
                        <td id=\"horse\"></td>
                    </tr>
                    <tr>
                        <td id=\"horse\"></td>
                        <td><img src=\"./cards/".$reading[0]->img."\"><p>".$reading[0]->name."</p></td>
                        <td id=\"horse\"></td>
                    </tr>
                    <tr>
                        <td id=\"horse\"></td>
                        <td id=\"stuff\">";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[0]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[0]->meaning_rev;
                        } 
                        echo "</td>
                        <td id=\"horse\"></td>
                    </tr>
                    <tr>
                        <th id=\"stuff\">DIFFICULTIES</th>
                        <td id=\"horse\"></td>
                        <th id=\"stuff\">RESPONSIBILITIES</th>
                    </tr>
                    <tr>
                        <td><img src=\"./cards/".$reading[2]->img."\"><p>".$reading[2]->name."</p></td>
                        <td id=\"horse\"></td>
                        <td><img src=\"./cards/".$reading[1]->img."\"><p>".$reading[1]->name."</p></td>
                    </tr>
                    <tr>
                        <td id=\"stuff\">";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[2]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[2]->meaning_rev;
                        } 
                        echo "</td>
                        <td id=\"horse\"></td>
                        <td id=\"stuff\">";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[1]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[1]->meaning_rev;
                        } 
                        echo "</td>
                    </tr>
                    <tr>
                        <th id=\"stuff\">OBSTACLES</th>
                        <td id=\"horse\"></td>
                        <th id=\"stuff\">SUPPORT</th>
                    </tr>
                    <tr>
                        <td><img src=\"./cards/".$reading[4]->img."\"><p>".$reading[4]->name."</p></td>
                        <td id=\"horse\"></td>
                        <td><img src=\"./cards/".$reading[3]->img."\"><p>".$reading[3]->name."</p></td>
                    </tr>
                    <tr>
                        <td id=\"stuff\">";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[4]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[4]->meaning_rev;
                        } 
                        echo "</td>
                        <td id=\"horse\"></td>
                        <td id=\"stuff\">";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[3]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[3]->meaning_rev;
                        } 
                        echo "</td>
                    </tr>
                    <tr>
                        <td id=\"horse\"></td>
                        <th id=\"stuff\">ACHIEVIMENTS</th>
                        <td id=\"horse\"></td>
                    </tr>
                    <tr>
                        <td id=\"horse\"></td>
                        <td><img src=\"./cards/".$reading[5]->img."\"><p>".$reading[5]->name."</p></td>
                        <td id=\"horse\"></td>
                    </tr>
                    <tr>
                        <td id=\"horse\"></td>
                        <td id=\"stuff\">";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[5]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[5]->meaning_rev;
                        } 
                        echo "</td>
                        <td id=\"horse\"></td>
                    </tr>
                    <tr>
                        <th id=\"stuff\">WORK, HEALTH, AND COMMUNICATION</th>
                        <td id=\"horse\"></td>
                        <th id=\"stuff\">ATTRACTION AND RELATIONSHIPS</th>
                    </tr>
                    <tr>
                        <td><img src=\"./cards/".$reading[7]->img."\"><p>".$reading[7]->name."</p></td>
                        <td id=\"horse\"></td>
                        <td><img src=\"./cards/".$reading[6]->img."\"><p>".$reading[6]->name."</p></td>
                    </tr>
                    <tr>
                        <td id=\"stuff\">";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[7]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[7]->meaning_rev;
                        } 
                        echo "</td>
                        <td id=\"horse\"></td>
                        <td id=\"stuff\">";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[6]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[6]->meaning_rev;
                        } 
                        echo "</td>
                    </tr>
                    <tr>
                        <td id=\"horse\"></td>
                        <th id=\"stuff\">HIDDEN INFLUENCES</th>
                        <td id=\"horse\"></td>
                    </tr>
                    <tr>
                        <td id=\"horse\"></td>
                        <td><img src=\"./cards/".$reading[8]->img."\"><p>".$reading[8]->name."</p></td>
                        <td id=\"horse\"></td>
                    </tr>
                    <tr>
                        <td id=\"horse\"></td>
                        <td id=\"stuff\">";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[8]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[8]->meaning_rev;
                        } 
                        echo "</td>
                        <td id=\"horse\"></td>
                    </tr>
                    <tr>
                        <td id=\"horse\"></td>
                        <th id=\"stuff\">THE PHYSICAL WORLD</th>
                        <td id=\"horse\"></td>
                    </tr>
                    <tr>
                        <td id=\"horse\"></td>
                        <td><img src=\"./cards/".$reading[9]->img."\"><p>".$reading[9]->name."</p></td>
                        <td id=\"horse\"></td>
                    </tr>
                    <tr>
                        <td id=\"horse\"></td>
                        <td id=\"stuff\">";
                        $orientation = rand(0,1);
                        if($orientation == 0) {
                            echo "MEANING: ".$reading[9]->meaning_up;
                        } else {
                            echo "MEANING IN REVERSE: ".$reading[9]->meaning_rev;
                        } 
                        echo "</td>
                        <td id=\"horse\"></td>
                    </tr>";
            break;
        default:
            echo "<p>This spread hasn't been added yet...</p>";
            break;
    }
    echo "</div>";
}
echo "</body></html>";

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

?>