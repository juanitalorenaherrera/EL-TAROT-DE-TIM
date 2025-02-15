<?php
header("Content-Type: text/html; charset=UTF-8");
mb_internal_encoding("UTF-8");

// Funcion para calcular el Dia Juliano
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

// Funcion para calcular la longitud de los planetas
function calcular_longitud_planeta($JD, $planeta) {
    $coeficientes = [
        "Sol" => [280.460, 0.98564736],
        "Luna" => [218.316, 13.176396],
        "Mercurio" => [252.250, 4.0923344368],
        "Venus" => [181.979, 1.6021302244],
        "Marte" => [355.433, 0.524061],
        "Jupiter" => [34.351, 0.083129],
        "Saturno" => [50.077, 0.033497],
        "Urano" => [314.055, 0.011731],
        "Neptuno" => [304.348, 0.006020],
        "Pluton" => [238.929, 0.003003]
    ];

    if (!isset($coeficientes[$planeta])) return null;

    $n = $JD - 2451545.0;
    $L = $coeficientes[$planeta][0] + ($coeficientes[$planeta][1] * $n);
    return fmod($L, 360);
}

// Funcion para calcular el ascendente
function calcular_ascendente($JD, $lat, $lon) {
    $LST = fmod(280.46061837 + 360.98564736629 * ($JD - 2451545) + $lon, 360);
    return fmod($LST + 90, 360);
}

// Funcion para calcular las casas astrologicas
function calcular_casas($ascendente) {
    $casas = [];
    for ($i = 0; $i < 12; $i++) {
        $casas[$i + 1] = fmod($ascendente + ($i * 30), 360);
    }
    return $casas;
}

// Funcion para generar la imagen de la carta astral
function generar_carta_astral($planetas, $ascendente, $casas) {
    $img = imagecreatetruecolor(600, 600);
    $blanco = imagecolorallocate($img, 255, 255, 255);
    $negro = imagecolorallocate($img, 0, 0, 0);
    $rojo = imagecolorallocate($img, 255, 0, 0);
    
    imagefilledrectangle($img, 0, 0, 600, 600, $blanco);
    imagearc($img, 300, 300, 500, 500, 0, 360, $negro);
    
    foreach ($casas as $num => $angulo) {
        $x = 300 + cos(deg2rad($angulo)) * 250;
        $y = 300 - sin(deg2rad($angulo)) * 250;
        imagestring($img, 3, $x, $y, $num, $negro);
    }
    
    foreach ($planetas as $planeta => $angulo) {
        $x = 300 + cos(deg2rad($angulo)) * 200;
        $y = 300 - sin(deg2rad($angulo)) * 200;
        imagefilledellipse($img, $x, $y, 10, 10, $rojo);
        imagestring($img, 3, $x + 5, $y - 5, $planeta, $negro);
    }

    imagepng($img, "carta_astral.png");
    imagedestroy($img);
}

// Función para determinar el signo zodiacal según la posición
function obtenerSignoZodiacal($grado) {
    $signos = [
        "Aries", "Tauro", "Géminis", "Cáncer", "Leo", "Virgo",
        "Libra", "Escorpio", "Sagitario", "Capricornio", "Acuario", "Piscis"
    ];
    return $signos[floor($grado / 30)];
}

// Función para calcular aspectos entre planetas
function calcularAspectos($posiciones) {
    $aspectos = [];
    $orbes = [0, 60, 90, 120, 180]; // Conjunción, sextil, cuadratura, trígono, oposición
    
    foreach ($posiciones as $planeta1 => $grado1) {
        foreach ($posiciones as $planeta2 => $grado2) {
            if ($planeta1 != $planeta2) {
                $diferencia = abs($grado1 - $grado2);
                foreach ($orbes as $aspecto) {
                    if (abs($diferencia - $aspecto) <= 5) { // Tolerancia de 5°
                        $aspectos[] = "$planeta1 y $planeta2 forman un aspecto de $aspecto grados";
                    }
                }
            }
        }
    }
    return $aspectos;
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha_nacimiento = $_POST["fecha"];
    $hora_nacimiento = $_POST["hora"];
    $latitud = floatval($_POST["latitud"]);
    $longitud = floatval($_POST["longitud"]);
	
    // Calcular D�a Juliano
    $JD = calcular_dia_juliano($fecha_nacimiento, $hora_nacimiento);

    // Calcular posiciones planetarias
    $planetas = [];
    foreach (["Sol", "Luna", "Mercurio", "Venus", "Marte", "J&uacute;piter", "Saturno", "Urano", "Neptuno", "Plut&oacute;n"] as $planeta) {
        $planetas[$planeta] = calcular_longitud_planeta($JD, $planeta);
    }

    // Calcular Ascendente
    $ascendente = calcular_ascendente($JD, $latitud, $longitud);

    // Calcular Casas Astrol�gicas
    $casas = calcular_casas($ascendente);

    // Generar imagen de la carta astral con casas
    generar_carta_astral($planetas, $ascendente, $casas);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>El Tarot de Tim - Carta Astral</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body,td,th {
	color: #FFFF66;
}
a:link {
	color: #FFFF66;
}
a:visited {
	color: #FFFF66;
}
a:hover {
	color: #FFFF66;
}
a:active {
	color: #FFFF66;
}

    .boton-chulo {
        background: linear-gradient(to right, #3498db, #2980b9); /* Degradado azul */
        color: white;
        padding: 12px 24px;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 25px; /* Esquinas redondeadas */
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
    }

    .boton-chulo:hover {
        background: linear-gradient(to right, #2980b9, #1c6691); /* Cambio de color al pasar el mouse */
        transform: scale(1.1); /* Hace el botón un poco más grande */
        box-shadow: 3px 3px 15px rgba(0, 0, 0, 0.4);
    }


-->
</style></head>
<body background="fondo_azul_oscuro.png">
<center>

<img src="header_Tarot_de_Tim.png" style="max-width: 100%; height: auto;">

<BR>
<link rel="stylesheet" href="menufiles/mbcsmb1uu0.css" type="text/css" />


<div id="mb1uu0ebul_wrapper" style="max-width: 275px;">
  <ul id="mb1uu0ebul_table" class="mb1uu0ebul_menulist css_menu">
  <li class="first_button"><div class="buttonbg gradient_button gradient30" style="width: 66px;"><div class="icon_1 with_img_16"><a href="http://eltarotdetim.free.nf" target="_self">Inicio</a></div></div></li>
  <li><div class="buttonbg gradient_button gradient30"><div class="arrow"><div class="icon_2 with_img_16"><a href="" class="button_2">Carta Astral</a></div></div></div>
    <ul>
    <li class="first_item last_item"><a href="carta_astral.php" target="_self" title="">Calcular Carta Astral</a></li>
    </ul></li>
  <li class="last_button"><div class="buttonbg gradient_button gradient30" style="width: 88px;"><div class="icon_3 with_img_16"><a href="http://eltarotdetim.free.nf/contacto.php">Contacto</a></div></div></li>
  </ul>
</div>
<!-- Menus will work without this javascript file. It is used only for extra
     effects, improved usability, compatibility with very old web browsers
     and support for touch screen devices. -->
<script type="text/javascript" src="menufiles/mbjsmb1uu0.js"></script>
<BR>

    <h2><img src="generador_carta_astral.png" width="516" height="48"></h2>
    <form method="POST">
        <label>Fecha de nacimiento:</label>
        <input type="date" name="fecha" required><br><br>
        <label>Hora de nacimiento:</label>
        <input type="time" name="hora" required><br><br>
        <label>Latitud:</label>
        <input type="text" name="latitud" required><br><br>
        <label>Longitud:</label>
        <input type="text" name="longitud" required><br><br>
<button type="submit" class="boton-chulo">🚀 Generar Carta Astral</button>
    </form></center>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <h3>Carta Astral Generada</h3>
<?php
$year = date("Y");
$month = date("m");
$day = date("d");

$age = getLunarPhase($year, $month, $day);
$phase_name = getPhaseName($age);

echo "<h2>La fase lunar para la fecha $year-$month-$day es: $phase_name (edad de la luna: $age días)</h2>";
?>
        <img src="carta_astral.png"><br>
        <h3>Posiciones Planetarias</h3>
        <?php foreach ($planetas as $planeta => $angulo) { ?>
          <p><b><?php echo mb_convert_encoding($planeta, "UTF-8", "auto"); ?></b> <?php echo round($angulo, 2); ?>&deg;</p>
        <?php } ?>
        <h3>Ascendente y Casas</h3>
        <?php foreach ($casas as $num => $angulo) { ?>
            <p><b>Casa <?php echo mb_convert_encoding($num, "UTF-8", "auto"); ?>:</b> <?php echo round($angulo, 2); ?>&deg;</p>
        <?php } ?>
    <?php } ?>

<?php
// Funci�n para obtener la fase lunar en el d�a actual
function getLunarPhase($year, $month, $day) {
    // Duraci�n del ciclo lunar en segundos (aproximadamente 29.5305882 d�as)
    $lp = 2551443; // Duraci�n del ciclo lunar en segundos (29.5305882 d�as)
    
    // Hora actual (hora local)
    $now = strtotime("$year-$month-$day 00:00:00");

    // Fecha de la �ltima Luna Nueva (6 de enero de 2000)
    $new_moon = strtotime("2000-01-06 18:14:00");

    // Calculamos la fase lunar: el tiempo transcurrido desde la �ltima luna nueva
    $phase = ($now - $new_moon) % $lp;
    $age = $phase / (24 * 3600); // Convertimos a d�as
    
    return $age;
}

// Funci�n para obtener el nombre de la fase lunar seg�n la edad
function getPhaseName($age) {
    if ($age < 1.84566) {
        return "Luna Nueva";
    } elseif ($age < 5.53699) {
        return "Creciente Visible";
    } elseif ($age < 9.22831) {
        return "Creciente C�ncava";
    } elseif ($age < 12.91963) {
        return "Primer Cuarto de Luna";
    } elseif ($age < 16.61096) {
        return "Creciente Gibosa";
    } elseif ($age < 20.30228) {
        return "Luna Llena";
    } elseif ($age < 23.99361) {
        return "Menguante Gibosa";
    } elseif ($age < 27.68493) {
        return "�ltimo Cuarto de Luna";
    } elseif ($age < 29.53059) {
        return "Menguante Concava";
    } else {
        return "Luna Nueva";
    }
}

?>

<?php
	$posiciones = generarPosicionesPlanetarias();
    $aspectos = calcularAspectos($posiciones);
	?>
	
 <?php if (!empty($posiciones)): ?>
            <?php foreach ($posiciones as $planeta => $grado): ?>
                <li><?php echo "$planeta: $grado° (" . obtenerSignoZodiacal($grado) . ")"; ?></li>
            <?php endforeach; ?>
        </ul>
        <h3>Aspectos:</h3>
        <ul>
            <?php foreach ($aspectos as $aspecto): ?>
                <li><?php echo $aspecto; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>