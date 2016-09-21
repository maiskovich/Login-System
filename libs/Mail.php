<?
require_once ('util/phpMailer/PHPMailerAutoload.php');
/**
 * Clase para el manejo de e-mails
 */
class Mail{
	/**
	 * Metodo para el envío de emails
	 * @param string $dest
	 * @param string $subject
	 * @param string $text
	 */
	public function send($dest,$subject,$text){
	$mail = new PHPMailer;	
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 465;
	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'ssl';
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "autorizar.transf.grupog@gmail.com";
	//Password to use for SMTP authentication
	$mail->Password = "Atgg2367";
	//Set who the message is to be sent from
	$mail->setFrom('autorizar.transf.grupog@gmail.com', 'Gumma SRL');
	//Set who the message is to be sent to
	$mail->addAddress($dest, $dest);
	//Set the subject line
	$mail->Subject = $subject;
	 // Set email format to HTML
	$mail->isHTML(true);                                 
	//Html Message
	$mail->Body    = $text;
	//Non html mail clients
	$mail->AltBody = $text;
		
	//send the message, check for errors
	if (!$mail->send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	    
	}	
		
		
	}
	
	
}
