<?php
// Mostrar errores para depurar
error_reporting(E_ALL);
ini_set('display_errors', 1);

$destinatario = "gerardoh@gecodex.com";
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];

$asunto = "Nuevo mensaje de contacto desde GeCodeX";
$cuerpo = "Nombre: $nombre\nCorreo: $email\nMensaje:\n$mensaje";
$headers = "From: $email";

$exito = mail($destinatario, $asunto, $cuerpo, $headers);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Prueba de alerta</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <h1 style="text-align:center;">Cargando alerta...</h1>
  <script>
    console.log("Entrando al SweetAlert");

    Swal.fire({
      icon: '<?php echo $exito ? "success" : "error"; ?>',
      title: '<?php echo $exito ? "Mensaje enviado con éxito" : "Error al enviar"; ?>',
      text: '<?php echo $exito ? "Gracias por contactarnos, " . $nombre . "." : "Hubo un problema al enviar el mensaje. Inténtalo más tarde."; ?>',
      confirmButtonText: 'OK'
    }).then(() => {
      window.location.href = "../index.html";
    });
  </script>
</body>
</html>

