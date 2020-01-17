<?php
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

require 'PHPMailer5.2/class.phpmailer.php';
require 'PHPMailer5.2/class.smtp.php';
require 'PHPMailer5.2/PHPMailerAutoload.php';


/* INICIALIZACIÓN DE SERVICIO PHPMAILER CON TRUE VERIFICA EXCEPCIONES */
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // VISUALIZAR LOS PROCESOS DE ENVIO PHP MAILER DESACTIVAR = 0
    $mail->isSMTP();                                            // ENVIAR EMAIL USANDO SMTP
    $mail->Host       = 'mail.tudominioexample.com';          // ESPECIFICAR EL SERVIDOR SMTP    smtp.gmail.com
    $mail->SMTPAuth   = true;                                   // ACTIVAR SMTP AUTENTICACIÓN
    $mail->Username   = 'israelkernel@tudominioexample.com';      // SMTP USUARIO QUIEN ENVIA EL EMAIL
    $mail->Password   = 'Password123456';                         // SMTP PASSWORD
    $mail->SMTPSecure = 'STARTTLS';                             // ACTIVAR EL TIPO DE ENCRIPACIÓN: TLS, SSL, STARTTLS
    $mail->Port       = 587;                                    // TCP PUERTO CONECTADO DESDE: 250, 220, 587

    /* RECIPIENTS */
    $mail->setFrom('israelkernel@tudominioexample.com', 'Kernel Envío');  // AGREGA QUIEN ENVIA EMAIL
    $mail->addAddress('destinokernelz@destinatario.com', 'Israel Kernel');      // AGREGAR DESTINATARIO
//    $mail->addAddress('israelkernel@tudominioexample.com');                     // AGREGAR DESTINATARIO SIN NOMBRE
//        $mail->addAddress('example@example.com');                             // NOMBRE OPCIONAL 
    
    /* AGREGAR COPIAS Y REPLICACIONES */
//    $mail->addReplyTo('israelkernel@reply.com', 'Israel Kernel');    // CAMBIAR A ANTES DE SETFROM EN CASO DE SPAM
//    $mail->addCC('israelkernel@addCC.com');                        // AGREGAR COPIA
//    $mail->addBCC('israelkernel@addbcc.com');                       // AGREGAR COPIA OCULTA
    
    
    /* LNEA DE VERIFICACIÓN OPCIONES DE SMTP */
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
); 

    /* ARCHIVOS ADJUNTOS */
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // AGREGAR ARCHIVOS ADJUNTOS
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // AGREGAR ARCHIVO CON NOMBRE OPCIONAL

    // Content
    $mail->isHTML(true);                                                // PERMITE ENVIAR EMAIL EN FORMATO HTML
    $mail->Subject = 'Bienvenido A Prueba De Correo';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';   
    $mail->AltBody = 'Previsualización del texto plano';

    $mail->send();
    echo 'EL EMAIL HA SIDO ENVIADO';
}catch (Exception $e)
{
    echo "EMAIL NO ENVIADO. Mailer Error: {$mail->ErrorInfo}";
}
?>