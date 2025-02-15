<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);



use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;



require './phpmailer/src/Exception.php';

require './phpmailer/src/PHPMailer.php';

require './phpmailer/src/SMTP.php';



// Crear una nueva instancia de PHPMailer

$mail = new PHPMailer(true);





if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capturamos los datos del formulario

    $nombre = strip_tags(trim($_POST["nombre"]));

    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    $mensaje = strip_tags(trim($_POST["mensaje"]));



    // Validaciones

    if (empty($nombre) || empty($email) || empty($mensaje)) {

        $error = "Todos los campos son obligatorios.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error = "Correo electr�nico no v�lido.";

    } else {



try {

    // Configuracion del servidor SMTP

    $mail->isSMTP();                                      // Usar SMTP

    $mail->Host = 'quazardev-net.correoseguro.dinaserver.com';                  // Servidor SMTP

    $mail->SMTPAuth = true;                               // Habilitar autenticación SMTP

    $mail->Username = 'quazardev@quazardev.net';            // Usuario SMTP (tu correo)

    $mail->Password = 'nucicfed33B&';                    // Contraseña SMTP

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Habilitar TLS (cifrado seguro)

    $mail->Port = 587;                                    // Puerto SMTP para TLS (puede ser 465 para SSL)

    $emailTim = "eltarotdetim@gmail.com";



    // Configuracion del correo

    $mail->setFrom('quazardev@quazardev.net', 'Contacto - El Tarot de Tim');

    $mail->addAddress($emailTim, 'Tarot de Tim'); // Añadir destinatario

    $mail->addReplyTo('eltarotdetim@gmail.com', 'Informacion de respuesta');



    // Contenido del correo

    $mail->isHTML(true);                                  // Enviar en formato HTML

    $mail->Subject = 'Asunto: El Tarot de Tim - Consulta de Usuario';

    $mail->Body    = $mensaje;





    // Enviar el correo

    $mail->send();

    echo "<center><p>El Correo ha sido enviado a El Tarot de Tim, gracias por contactarnos.</p></center>";



} catch (Exception $e) {



    echo "<center><p>El Email no ha podido ser enviado a El Tarot de Tim. Error: {$mail->ErrorInfo} </center><p>";

}





    }

}

?>



<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contacto</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">

<!--

body,td,th {

	color: #66B3FF;

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


    input, textarea {
        background-color: #D6EAF8; /* Azul claro */
        border: 1px solid #AED6F1; /* Borde azul más oscuro */
        padding: 5px;
        border-radius: 5px; /* Esquinas redondeadas */
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

<BR><BR>
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



   <h2 align="center">&nbsp;</h2>
<p align="center"><img src="contactar2.png" width="890" height="67"></p>

<?php if (isset($error)) echo "<p class='mensaje' style='color:red;'>$error</p>"; ?>
<?php if (isset($exito)) echo "<p class='mensaje' style='color:green;'>$exito</p>"; ?>

<table align="center" border="0" cellspacing="10">
    <tr>
        <!-- Imagen alineada a la izquierda -->
        <td align="center" valign="top">
            <img src="contacto.png" width="230" height="220">
        </td>
        <!-- Formulario alineado a la derecha -->
        <td>
            <form action="contacto.php" method="POST">
                <table border="0" cellspacing="5">
                    <tr>
                        <td align="right"><label for="nombre">Su Nombre:</label></td>
                        <td><input type="text" name="nombre" id="nombre" required></td>
                    </tr>
                    <tr>
                        <td align="right"><label for="email">Su Email:</label></td>
                        <td><input type="email" name="email" id="email" required></td>
                    </tr>
                    <tr>
                        <td align="right" valign="top"><label for="mensaje">Su Mensaje:</label></td>
                        <td><textarea name="mensaje" id="mensaje" cols="50" rows="6" required></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                           <button type="submit" class="boton-chulo">🚀 Enviar Mensaje</button>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>



</body>

</html>