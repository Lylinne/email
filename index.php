<?php
session_start();

function EnvoiMail($setFrom, $mail, $smtp){
	require_once 'vendor/autoload.php';
	require_once 'config.php';

	//création du transport pour l'envoie du mail
	$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
	->setUsername($setFrom)
	  ->setPassword($passe)
	;

	$mailer = new Swift_Mailer($transport);

	// Création du mail
	$message = (new Swift_Message('Wonderful Subject'))
	  ->setFrom($setFrom)
	  ->setTo($mail)
	  ->setBody('', 'text/html')
	  ;

	// Nombre de mail evoyé
	$numSent = $mailer->send($message);
	printf("Sent %d messages\n", $numSent);
}

//$_SESSION["mail"] ="ok";

if (!empty($_SESSION["mail"])) {
	envoiMail('nikkinoaya@gmail.com', 'nikkinoaya@gmail.com', 'Lylinne');
	unset($_SESSION["mail"]);

}
else{
	echo "Rafraichir la page pour votre surprise";
	print(envoiMail());
	header("refresh");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
</body>
</html>