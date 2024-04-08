<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombre = $_POST['name'];
    $correo = $_POST['mail'];
    $telefono = $_POST['phone'];
    $mensaje = $_POST['message'];
    
    // Correo al que se enviará el formulario
    $destinatario = "alvaroquesadaazana@gmail.com";
    
    // Asunto del correo
    $asunto = "Nuevo mensaje desde el formulario de contacto";
    
    // Cuerpo del correo
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo: $correo\n";
    $contenido .= "Teléfono: $telefono\n";
    $contenido .= "Mensaje:\n$mensaje";
    
    // Cabeceras del correo
    $cabeceras = "From: $correo";

    // Envía el correo
    if (mail($destinatario, $asunto, $contenido, $cabeceras)) {
        echo "¡El mensaje ha sido enviado con éxito!";
    } else {
        echo "Hubo un error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.";
    }
} else {
    // Si no se ha enviado el formulario, redirige al formulario de contacto
    header("Location: formulario_contacto.html");
    exit;
}
?>