<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

class Correo
{
    public function enviarCorreo($destino,$destinatario,$asunto,$mensaje,$destinoDoc, $nombreDoc)
    {
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.sendgrid.net';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'apikey';
            $mail->Password   = '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';
            $mail->Port       = 587;

            $mail->setFrom('contacto@hoteltecweb.xyz', 'Curso solicitud');
            $mail->addAddress($destinoDoc, $nombreDoc);

            $contenido = "Alumno: " . $destinatario . " Corre: " . $destino . " Asunto: " . $asunto;

            $mail->isHTML(true);
            $mail->Subject = $contenido;
            $mail->Body    = $mensaje;
            $mail->AltBody = $asunto;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
