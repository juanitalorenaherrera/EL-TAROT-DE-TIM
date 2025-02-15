<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<center>
<img src="header_Tarot_de_Tim.png"style="max-width:100%;width:auto;height:auto;">

</center>
<?php
header("Content-Type: text/html; charset=UTF-8");

// Función para calcular el Día Juliano
function calcular_dia_juliano($fecha, $hora) {
    $anio = (int)date("Y", strtotime($fecha));
    $mes = (int)date("m", strtotime($fecha));
    $dia = (int)date("d", strtotime($fecha));
    $hora_decimal = (int)date("H", strtotime($hora)) + ((int)date("i", strtotime($hora)) / 60);

    if ($mes <= 2) {
        $anio -= 1;
        $mes += 12;
    }

    $A = floor($anio / 100);
    $B = 2 - $A + floor($A / 4);
    $JD = floor(365.25 * ($anio + 4716)) + floor(30.6001 * ($mes + 1)) + $dia + $hora_decimal / 24 + $B - 1524.5;

    return $JD;
}

// Función para calcular la longitud de los planetas
function calcular_longitud_planeta($JD, $planeta) {
    $coeficientes = [
        "Sol" => [280.460, 0.98564736],
        "Luna" => [218.316, 13.176396],
        "Mercurio" => [252.250, 4.0923344368],
        "Venus" => [181.979, 1.6021302244],
        "Marte" => [355.433, 0.524061],
        "Júpiter" => [34.351, 0.083129],
        "Saturno" => [50.077, 0.033497],
        "Urano" => [314.055, 0.011731],
        "Neptuno" => [304.348, 0.006020],
        "Plutón" => [238.929, 0.003003]
    ];

    if (!isset($coeficientes[$planeta])) return null;

    $n = $JD - 2451545.0;
    $L = $coeficientes[$planeta][0] + ($coeficientes[$planeta][1] * $n);
    return fmod($L, 360);
}

// Función para calcular el ascendente
function calcular_ascendente($JD, $lat, $lon) {
    $LST = fmod(280.46061837 + 360.98564736629 * ($JD - 2451545) + $lon, 360);
    return fmod($LST + 90, 360);
}

// Función para generar la imagen de la carta astral
function generar_carta_astral($planetas, $ascendente) {
    $img = imagecreatetruecolor(600, 600);
    $blanco = imagecolorallocate($img, 255, 255, 255);
    $negro = imagecolorallocate($img, 0, 0, 0);
    $rojo = imagecolorallocate($img, 255, 0, 0);
    
    imagefilledrectangle($img, 0, 0, 600, 600, $blanco);
    imagearc($img, 300, 300, 500, 500, 0, 360, $negro);
    
    foreach ($planetas as $planeta => $angulo) {
        $x = 300 + cos(deg2rad($angulo)) * 200;
        $y = 300 - sin(deg2rad($angulo)) * 200;
        imagefilledellipse($img, $x, $y, 10, 10, $rojo);
        imagestring($img, 3, $x + 5, $y - 5, $planeta, $negro);
    }

    $x_asc = 300 + cos(deg2rad($ascendente)) * 250;
    $y_asc = 300 - sin(deg2rad($ascendente)) * 250;
    imagestring($img, 5, $x_asc, $y_asc, "ASC", $negro);

    imagepng($img, "carta_astral.png");
    imagedestroy($img);
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha_nacimiento = $_POST["fecha"];
    $hora_nacimiento = $_POST["hora"];
    $latitud = floatval($_POST["latitud"]);
    $longitud = floatval($_POST["longitud"]);

    // Calcular Día Juliano
    $JD = calcular_dia_juliano($fecha_nacimiento, $hora_nacimiento);

    // Calcular posiciones planetarias
    $planetas = [
        "Sol" => calcular_longitud_planeta($JD, "Sol"),
        "Luna" => calcular_longitud_planeta($JD, "Luna"),
        "Mercurio" => calcular_longitud_planeta($JD, "Mercurio"),
        "Venus" => calcular_longitud_planeta($JD, "Venus"),
        "Marte" => calcular_longitud_planeta($JD, "Marte"),
        "Júpiter" => calcular_longitud_planeta($JD, "Júpiter"),
        "Saturno" => calcular_longitud_planeta($JD, "Saturno"),
        "Urano" => calcular_longitud_planeta($JD, "Urano"),
        "Neptuno" => calcular_longitud_planeta($JD, "Neptuno"),
        "Plutón" => calcular_longitud_planeta($JD, "Plutón")
    ];

    // Calcular Ascendente
    $ascendente = calcular_ascendente($JD, $latitud, $longitud);

    // Generar imagen de la carta astral
    generar_carta_astral($planetas, $ascendente);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta Astral</title>
</head>
<body>
    <h2>Generador de Carta Astral</h2>

    <form method="POST">
        <label>Fecha de nacimiento:</label>
        <input type="date" name="fecha" required><br><br>

        <label>Hora de nacimiento:</label>
        <input type="time" name="hora" required><br><br>

        <label>Latitud:</label>
        <input type="text" name="latitud" placeholder="Ej: 40.7128" required><br><br>

        <label>Longitud:</label>
        <input type="text" name="longitud" placeholder="Ej: -74.0060" required><br><br>

        <button type="submit">Generar Carta Astral</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <h3>Carta Astral Generada</h3>
        <img src="carta_astral.png"><br>

        <h3>Posiciones Planetarias</h3>
        <?php foreach ($planetas as $planeta => $angulo) { ?>
            <p><b><?php echo $planeta; ?>:</b> <?php echo round($angulo, 2); ?>°</p>
        <?php } ?>

        <h3>Ascendente</h3>
        <p><b>ASC:</b> <?php echo round($ascendente, 2); ?>°</p>
    <?php } ?>
</body>
</html>
