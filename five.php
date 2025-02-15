<?php
require_once 'tarotReading.php';

$reading = getCards(5, $deck);
$orientation = getOrientations(5);

echo "<style>
    table { width: 100%; border-collapse: collapse; text-align: center; }
    th, td { border: 1px solid #ddd; padding: 10px; }
    img { max-width: 100%; height: auto; display: block; margin: 0 auto; }
    @media screen and (max-width: 768px) {
        table { display: block; overflow-x: auto; white-space: nowrap; }
        th, td { display: block; width: 100%; }
    }
</style>";

echo "<table>
    <tr>
        <th>Pasado y como llevo al presente</th>
        <th>PRESENTE</th>
        <th>INFLUENCIAS ESCONDIDAS EN EL PRESENTE</th>
        <th>CONSEJO</th>
        <th>DESENLACE</th>
    </tr>
    <tr>";
        printImage($orientation, $reading, 0);
        printImage($orientation, $reading, 1);
        printImage($orientation, $reading, 2);
        printImage($orientation, $reading, 3);
        printImage($orientation, $reading, 4);
    echo "</tr>
    <tr>
        <td>";
            printMeaning($orientation, $reading, 0);  
        echo "</td>
        <td>";
            printMeaning($orientation, $reading, 1);
        echo "</td>
        <td>";
            printMeaning($orientation, $reading, 2);
        echo "</td>
        <td>";
            printMeaning($orientation, $reading, 3);
        echo "</td>
        <td>";
            printMeaning($orientation, $reading, 4); 
echo "</td>
    </tr>
</table>";
?>