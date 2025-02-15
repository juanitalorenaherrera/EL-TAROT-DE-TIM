<?php
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
?>