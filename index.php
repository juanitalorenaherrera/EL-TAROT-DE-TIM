<style type="text/css">



<!--



a:link {



	color: #7CBCFC;



}



a:visited {



	color: #7CBCFC;



}



a:hover {



	color: #7CBCFC;



}



a:active {



	color: #7CBCFC;



}



body {



	background-image: url(fondo_azul_oscuro.png);



	background-color: #3E0000;



}







table, th, td {



    border: 2px solid;



    margin: 10px auto;



    border-radius: 5px;



    table-layout: fixed;



    background-color: #000000;



    color: #999999;



    padding: 10px;



		background-image: url(fondo4.png);



}







#myheader{







}







html{



    max-width: 1250px;



    margin: auto;



    color: #000000;



    text-align: center;



    background-color: #000000;



}











#wrapper {



    margin: 0px auto;



    display: grid;



    max-width: 1200px;



    min-width: 800px;



    min-height:100vh;



    border-color: #003300;



    border-style: double;



    border-width: 0 10px;



    padding: 0px 5px;



    grid-template-columns: 10% auto auto;



    grid-template-rows: 140px auto 140px ;



}







#myform {



    padding: 10px;



}







img{



    max-width: 1492px;



}







#horse {



    background-color: #003300;



    border: none;



}







#stuff {



    max-width: 1492px;



    border: 2px palevioletred solid;



    margin: 10px;



    border-radius: 5px;



    table-layout: fixed;



    background-color: #003300;



    color: whitesmoke;



    width: 1492px;



}







#tables{



    margin:auto;



    



}







td, th {



    max-width: 1500px;



}







#reverse {



    transform: rotate(180deg);



}



body,td,th {



	color: #FFFF66;



}







-->



</style>







<?php



session_start();







// Define la contraseña correcta



$contraseña_correcta = "TIM";







// Verifica si la contraseña ha sido enviada



if ($_SERVER["REQUEST_METHOD"] == "POST") {



    if (!empty($_POST["password"]) && $_POST["password"] === $contraseña_correcta) {



        $_SESSION["autenticado"] = true;



        header("Location: " . $_SERVER["PHP_SELF"]); // Recargar la página



        exit;



    } else {



        $error = "Contraseña incorrecta.";



    }



}







// Si el usuario ya está autenticado, muestra el contenido protegido



if (isset($_SESSION["autenticado"]) && $_SESSION["autenticado"] === true) {







$year = date("Y");



$month = date("m");



$day = date("d");







$age = getLunarPhase($year, $month, $day);



$age = number_format($age, 2);



$phase_name = getPhaseName($age);







echo <<<_HEADER



    <!DOCTYPE html>



    <html lang="en">





    <head>



        <meta charset="UTF-8">



        <meta http-equiv="X-UA-Compatible" content="IE=edge">



        <meta name="viewport" content="width=device-width, initial-scale=1.0">



        <title>El Tarot de Tim</title>



    </head>



_HEADER;







echo <<<_CHOICE



<body>



<center>



<img src="header_Tarot_de_Tim.png"style="max-width:100%;width:auto;height:auto;">





<h2>La fase lunar HOY $year-$month-$day es: $phase_name (edad de la luna: $age días)</h2>







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



<script type="text/javascript" src="menufiles/mbjsmb1uu0.js"></script><BR>

<div style="text-align: center;">

    <h3>Escuchar Tarot Radio</h3>

    

    <!-- Combo para seleccionar emisora -->

    <select id="emisoras" onchange="cambiarEmisora()">

        <option value="https://radio.stereoscenic.com:443/asp-s">Emsora 1- Tarot</option>

        <option value="http://2.58.194.54:8840/stream">Emisora 2 - Música Chill</option>

        <option value="http://66.85.89.59:80/1719_128?fromyp=true">Emisora 3 - 80's Music</option>

        <!-- Agrega más emisoras aquí -->

    </select>



    <br><br>



    <!-- Reproductor de audio -->

    <audio id="reproductor" controls autoplay>

        <source id="streamSource" src="http://miemisora.com:8000/stream" type="audio/mp3">

        Tu navegador no soporta el reproductor de audio.

    </audio>

</div>



<script>

    function cambiarEmisora() {

        // Obtener el valor seleccionado del combo

        var emisora = document.getElementById('emisoras').value;



        // Actualizar el atributo src del reproductor

        var reproductor = document.getElementById('reproductor');

        var fuente = document.getElementById('streamSource');



        fuente.src = emisora;

        reproductor.load();  // Recargar el reproductor con la nueva fuente

        reproductor.play();  // Reproducir inmediatamente después de cambiar

    }

</script>

	<BR><BR>

</div>









    <form id="myform" method="post" action="tarotReading.php">



        <label for="spread">TAROT:</label>



        <select name="spread" id="spread">



            <option value="one">Una Carta</option>



            <option value="three">Tres Cartas</option>



            <option value="five">Cinco Cartas</option>



            <option value="horse">Horseshoe</option>



            <option value="tree">Arbol de la Vida</option>



        </select>



        <input type="submit" value="Tirar Cartas" id="read"><BR>



    </form>







_CHOICE;







require_once 'functions.php';



if(empty($_POST)){ //if the user has not submited choices no questions will be shown



    echo "<p>Esperando Su Seleccion...</p></body></html>";



} else {



    $file = file_get_contents("tarot-deck-es.json");



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



	echo "<h2>Contacto</h2><p>Correo: eltarotdetim@gmail.com</p><p>Teléfono: <a href='tel:+57 316 4161075'>+57 316 4161075";



    echo "</center></div>";



	echo "<footer class='text-center mt-5'>";



    echo "<p>&copy; 2025 EL TAROT DE TIM. Todos los derechos reservados.</p>";



    echo "</footer></body></html>";



}







    echo '<a href="logout.php">Cerrar sesión</a>';



} else {



    // Muestra el formulario de acceso



    ?>



    <form method="post">



        <label for="password">Contraseña:</label>



        <input type="password" name="password" required>



        <input type="submit" value="Ingresar">



    </form>



    <?php



    if (isset($error)) {



        echo "<p style='color:red;'>$error</p>";



    }



}



?>



	







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



        return "Menguante C�ncava";



    } else {



        return "Luna Nueva";



    }



}







?>







