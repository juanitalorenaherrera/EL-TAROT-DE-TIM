<?php
require_once 'tarotReading.php';

$reading = getCards(7, $deck);
$orientation = getOrientations(7);

echo "<table id=\"horse\">
<tr>
    <td id=\"horse\"></td>
    <td id=\"horse\"></td>
    <th id=\"stuff\">OBSTACULOS</th>
    <td id=\"horse\"></td>
    <td id=\"horse\"></td>
</tr>
<tr>
    <td id=\"horse\"></td>
    <th id=\"stuff\">INFLUENCIAS OCULTAS</th>";
    printImage($orientation, $reading, 3);
    echo "<th id=\"stuff\">OUTSIDE INFLUENCES</th>
    <td id=\"horse\"></td>
</tr>
<tr>
    <th id=\"stuff\">PRESENTE</th>";
    printImage($orientation, $reading, 2);
    echo "<td id=\"stuff\">";
      
    printMeaning($orientation, $reading, 3); 
    echo "</td>";
    printImage($orientation, $reading, 4);
    echo "<th id=\"stuff\">SOLUCION</th>
</tr>
<tr>";
    printImage($orientation, $reading, 1);
    echo "<td id=\"stuff\">";
      
    printMeaning($orientation, $reading, 2);
    echo "</td>
    <td id=\"horse\"></td>
    <td id=\"stuff\">";
      
    printMeaning($orientation, $reading, 4); 
    echo "</td>";
    printImage($orientation, $reading, 5);
echo "</tr>
<tr>
    <td id=\"stuff\">";
      
    printMeaning($orientation, $reading, 1);
    echo "</td>
    <td id=\"horse\"></td>
    <td id=\"horse\"></td>
    <td id=\"horse\"></td>
    <td id=\"stuff\">";
      
    printMeaning($orientation, $reading, 5); 
    echo "</td>
</tr>
<tr>
<th id=\"stuff\">PASADO Y COMO AFRONTAR ESTE PROBLEMA</th>
    <td id=\"horse\"></td>
    <td id=\"horse\"></td>
    <td id=\"horse\"></td>
    <th id=\"stuff\">OUTCOME</th>
</tr>
<tr>";
    printImage($orientation, $reading, 0);
    echo "<td id=\"horse\"></td>
    <td id=\"horse\"></td>
    <td id=\"horse\"></td>";
    printImage($orientation, $reading, 6);
echo "</tr>
<tr>
    <td id=\"stuff\">";
      
    printMeaning($orientation, $reading, 0);
    echo "</td>
    <td id=\"horse\"></td>
    <td id=\"horse\"></td>
    <td id=\"horse\"></td>
    <td id=\"stuff\">";
      
    printMeaning($orientation, $reading, 6);
    echo "</td>
</tr>
</table>";
?>