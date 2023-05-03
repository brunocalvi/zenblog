<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../includes/config.php';
require '../models/Message.php';
require 'vendor/autoload.php';

$message = new Message();

if(isset($_POST['email'])) {
    $mail = new PHPMailer(true);

    $nome		=	$_POST['nome'];
	  $mensagem	=	$_POST['msg'];
	  $email		=	strtolower($_POST['email']);
    $assunto    =   $_POST['assunto'];

    try {
        //Configurações do servidor
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Ativar saída de depuração detalhada
        $mail->isSMTP();                                            //Enviar usando SMTP
        $mail->Host       = HOST_EMAIL;                             //Definir o servidor SMTP para enviar através
        $mail->SMTPAuth   = true;                                   //Ativar autenticação SMTP
        $mail->Username   = DISPARA_MAIL;                           //SMTP Usuario
        $mail->Password   = PASSWORD_MAIL;                          //SMTP senha
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Habilitar criptografia TLS implícita
        $mail->Port       = PORT_SERVE;                             //porta TCP para conectar; use 587 se você tiver definido `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Destinatários
        $mail->setFrom(DISPARA_MAIL , DISPARA_NAME);
        $mail->addAddress(DISPARA_MAIL , DISPARA_NAME);             //Adicionar um destinatário - quem vai receber o form
        //$mail->addAddress('ellen@example.com');                   //O nome é opcional - se caso outras pessoas forem receber 
        $mail->addReplyTo(DISPARA_MAIL , DISPARA_NAME);             //e-mail de resposta
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //anexos
        //$mail->addAttachment('/var/tmp/file.tar.gz');             //Add anexos
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');        //Nome opcional

        //Content
        $mail->isHTML(true);                                        //Definir formato de e-mail para HTML
        $mail->Subject = ASSUNTO_EMAIL;

        $body = "
                    <b>Contato pelo " . TITLE . ":</b><br/><br/>
                    <b>Nome:</b> " . $nome . "<br/>
                    <b>Assunto:</b> " . $assunto . "<br/>
                    <b>E-mail:</b> " . $email . "<br/><br/>
                    <b>Mensagem:</b> <br/>" . $mensagem . "<br/>    
                ";


        $mail->Body    = $body;
        $mail->AltBody = " Nome: " . $nome ." Assunto: " . $assunto . " E-mail: " . $email . " Mensagem: " . $mensagem;

        $mail->send();
        $message->setMessage('Mensagem enviada com sucesso ! Aguarde, em breve daremos o retorno!');
        header('Location: ' . PATH_DEFAULT . '/contact');

    } catch (Exception $e) {
        $message->setMessage("Mensagem não foi enviada. Tente novamente Erro:{ $mail->ErrorInfo }");
        header('Location: ' . PATH_DEFAULT . '/contact');
    }

} else {
    $message->setMessage('Falha ao enviar o e-mail, preencha todos os campos obrigatórios e tente novamente!');
    header('Location: ' . PATH_DEFAULT . '/contact');
}