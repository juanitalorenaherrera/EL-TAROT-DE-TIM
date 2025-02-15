<?php
require_once 'tarotReading.php';

$reading = getCards(10, $deck);
$orientation = getOrientations(10);
echo "<table id=\"horse\">
<tr>
    <td id=\"horse\"></td>
    <th id=\"stuff\">PRESENTE</th>
    <td id=\"horse\"></td>
</tr>
<tr>
    <td id=\"horse\"></td>";
    printImage($orientation, $reading, 0);
    echo "<td id=\"horse\"></td>
</tr>
<tr>
    <td id=\"horse\"></td>
    <td id=\"stuff\">";
    printMeaning($orientation, $reading, 0);  
    echo "</td>
    <td id=\"horse\"></td>
</tr>
<tr>
    <th id=\"stuff\">DIFICULTADES</th>
    <td id=\"horse\"></td>
    <th id=\"stuff\">RESPONSABILIDADES</th>
</tr>
<tr>";
    printImage($orientation, $reading, 2);
    echo "<td id=\"horse\"></td>";
    printImage($orientation, $reading, 1);
echo "</tr>
<tr>
    <td id=\"stuff\">";
    printMeaning($orientation, $reading, 2); 
    echo "</td>
    <td id=\"horse\"></td>
    <td id=\"stuff\">";
    printMeaning($orientation, $reading, 1); 
    echo "</td>
</tr>
<tr>
    <th id=\"stuff\">OBSTACULOS</th>
    <td id=\"horse\"></td>
    <th id=\"stuff\">SOPORTE/APOYO</th>
</tr>
<tr>";
    printImage($orientation, $reading, 4);
    echo "<td id=\"horse\"></td>";
    printImage($orientation, $reading, 3);
echo "</tr>
<tr>
    <td id=\"stuff\">";
    printMeaning($orientation, $reading, 4); 
    echo "</td>
    <td id=\"horse\"></td>
    <td id=\"stuff\">";
    printMeaning($orientation, $reading, 3); 
    echo "</td>
</tr>
<tr>
    <td id=\"horse\"></td>
    <th id=\"stuff\">LOGROS</th>
    <td id=\"horse\"></td>
</tr>
<tr>
    <td id=\"horse\"></td>";
    printImage($orientation, $reading, 5);
    echo "<td id=\"horse\"></td>
</tr>
<tr>
    <td id=\"horse\"></td>
    <td id=\"stuff\">";
    printMeaning($orientation, $reading, 5); 
    echo "</td>
    <td id=\"horse\"></td>
</tr>
<tr>
    <th id=\"stuff\">TRABAJO - SALUD y COMUNICACIONES</th>
    <td id=\"horse\"></td>
    <th id=\"stuff\">ATRACCION Y RELACIONES</th>
</tr>
<tr>";
    printImage($orientation, $reading, 7);
    echo "<td id=\"horse\"></td>";
    printImage($orientation, $reading, 6);
echo "</tr>
<tr>
    <td id=\"stuff\">";
    printMeaning($orientation, $reading, 7); 
    echo "</td>
    <td id=\"horse\"></td>
    <td id=\"stuff\">";
    printMeaning($orientation, $reading, 6); 
    echo "</td>
</tr>
<tr>
    <td id=\"horse\"></td>
    <th id=\"stuff\">INFLUENCIAS OCULTAS</th>
    <td id=\"horse\"></td>
</tr>
<tr>
    <td id=\"horse\"></td>";
    printImage($orientation, $reading, 8);
    echo "<td id=\"horse\"></td>
</tr>
<tr>
    <td id=\"horse\"></td>
    <td id=\"stuff\">";
    printMeaning($orientation, $reading, 8); 
    echo "</td>
    <td id=\"horse\"></td>
</tr>
<tr>
    <td id=\"horse\"></td>
    <th id=\"stuff\">EL MUNDO REAL o FISICO</th>
    <td id=\"horse\"></td>
</tr>
<tr>
    <td id=\"horse\"></td>";
    printImage($orientation, $reading, 9);
    echo "<td id=\"horse\"></td>
</tr>
<tr>
    <td id=\"horse\"></td>
    <td id=\"stuff\">";
    printMeaning($orientation, $reading, 9); 
    echo "</td>
    <td id=\"horse\"></td>
</tr>
</table>";
?>