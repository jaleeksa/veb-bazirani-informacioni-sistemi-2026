<?php


$mail_sent = false;

if ($_POST) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	
	if ($name == '')
		$_error[] = 'Unesite vaše ime';
	if ($email == '')
		$_error[] = 'Unesite vaš email';
	if ($message == '')
		$_error[] = 'Unesite vašu poruku';

	if (!$_error) {
		/*
			PAZI!
			U localhost-u PHP ne može da pošalje mail zbog
			blokiranog porta 25 (SMTP). Testiranje je moguće
			na web serveru koji pripada nekoj hosting
			kompaniji, ili promenom konfiguracije u php.ini
			fajlu.
		*/
		$mail_sent = @mail(
						'aleksa.spasa@gmail.com', 
						'WBIS message', 
						"
							From: {$name} <{$email}>\n
							Message: {$message}
						"
					);
		if ($mail_sent)
			$_message[] = 'Vaša poruka je poslata. Odgovorićemo Vam u roku od 24 sata.';
		else {
			$_error[] = 'Poruka nije poslata. Pokušajte ponovo malo kasnije';
		}
	}
}


$_output['_error'] = $_error;
$_output['_message'] = $_message;
$_output['model-name'] = 'contact';
$_output['view-name'] = 'view-contact.php';


?>
