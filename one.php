<?php
require_once 'tarotReading.php';

$reading = getCards(1, $deck);
$orientation = getOrientations(1);
echo "<table>
    <tr>
        <th>QUE TENER EN CUENTA</th>
    </tr>
    <tr>";
        printImage($orientation, $reading, 0);
    echo "</tr>
    <tr>
        <td>";
            printMeaning($orientation, $reading, 0);
echo "</td>
    </tr>
</table>";


$tableContent = "<?php
echo \"<table>
    <tr>
        <th>QUE TENER EN CUENTA</th>
    </tr>
    <tr>\";
        printImage(\$orientation, \$reading, 0);
    echo \"</tr>
    <tr>
        <td>\";
            printMeaning(\$orientation, \$reading, 0);
echo \"</td>
    </tr>
</table>\";
?>";
// Nombre del archivo donde se guardará la tabla (por ejemplo, "tabla.html")
$filePath = "TAROT_CLIENTE.php";

// Guardar el contenido en el archivo
file_put_contents($filePath, $tableContent);

?>