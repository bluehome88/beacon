<?php 
require_once get_template_directory()."/includes/phpmailer/class.phpmailer.php";
/**
* Mail function (uses phpMailer)
* @param string From e-mail address
* @param string From name
* @param string/array Recipient e-mail address(es)
* @param string E-mail subject
* @param string Message body
* @param boolean false = plain text, true = HTML
* @param string/array CC e-mail address(es)
* @param string/array BCC e-mail address(es)
* @param string/array Attachment file name(s)
* @param string/array ReplyTo e-mail address(es)
* @param string/array ReplyTo name(s)
* @return boolean
*/
function mosMail( $from, $fromname, $recipient, $subject, $body, $mode=0, $cc=NULL, $bcc=NULL, $attachment=NULL, $replyto=NULL, $replytoname=NULL ) {

	global $config;
	$mosConfig_absolute_path = $config['abs_path'];
	$mosConfig_mailfrom = $config['mail_from'];
	$mosConfig_fromname = $config['mail_from_name'];
	$mosConfig_mailer = "mail";

	// Allow empty $from and $fromname settings (backwards compatibility)
	if ($from == '') {
		$from = $mosConfig_mailfrom;
	}
	if ($fromname == '') {
		$fromname = $mosConfig_fromname;
	}

	// Filter from, fromname and subject
	if (!JosIsValidEmail( $from ) || !JosIsValidName( $fromname ) || !JosIsValidName( $subject )) {
		return false;
	}
	
	$mail = mosCreateMail( $from, $fromname, $subject, $body );

	// activate HTML formatted emails
	if ( $mode ) {
		$mail->IsHTML(true);
	}

	if (is_array( $recipient )) {
		foreach ($recipient as $to) {
			$to = trim($to);
			if (!JosIsValidEmail( $to )) {
				return false;
			}
			$mail->AddAddress( $to );
		}
	} else {
			$recipient = trim($recipient);
		if (!JosIsValidEmail( $recipient )) {
			return false;
		}
		$mail->AddAddress( $recipient );
	}
	if (isset( $cc )) {
		if (is_array( $cc )) {
			foreach ($cc as $to) {
				$to = trim($to);
				if (!JosIsValidEmail( $to )) {
					return false;
				}
				$mail->AddCC($to);
			}
		} else {
				$cc = trim($cc);
			if (!JosIsValidEmail( $cc )) {
				return false;
			}
			$mail->AddCC($cc);
		}
	}

	if (isset( $bcc )) {
		if (is_array( $bcc )) {
			foreach ($bcc as $to) {
					$to = trim($to);
				if (!JosIsValidEmail( $to )) {
					return false;
				}
				$mail->AddBCC( $to );
			}
		} else {
				$bcc = trim($bcc);
			if (!JosIsValidEmail( $bcc )) {
				return false;
			}
			$mail->AddBCC( $bcc);
		}
	}
	if ($attachment) {
		if (is_array( $attachment )) {
			foreach ($attachment as $fname) {
				$mail->AddAttachment( $fname );
			}
		} else {
			$mail->AddAttachment($attachment);
		}
	}
	
	//Important for being able to use mosMail without spoofing...
	if ($replyto) {
		if (is_array( $replyto )) {
			reset( $replytoname );
			foreach ($replyto as $to) {
				$toname = ((list( $key, $value ) = each( $replytoname )) ? $value : '');
				$to = trim($to);
				if (!JosIsValidEmail( $to ) || !JosIsValidName( $toname )) {
					return false;
				}
				$mail->AddReplyTo( $to, $toname );
			}
        } else {
			$replyto = trim($replyto);
			if (!JosIsValidEmail( $replyto ) || !JosIsValidName( $replytoname )) {
				return false;
			}
			$mail->AddReplyTo($replyto, $replytoname);
		}
    }

	$mailssend = $mail->Send();

	if( $mail->error_count > 0 ) {
		//$mosDebug->message( "The mail message $fromname <$from> about $subject to $recipient <b>failed</b><br /><pre>$body</pre>", false );
		//$mosDebug->message( "Mailer Error: " . $mail->ErrorInfo . "" );
	}
	return $mailssend;
} // mosMail

/**
 * Checks if a given string is a valid email address
 *
 * @param	string	$email	String to check for a valid email address
 * @return	boolean
 */
function JosIsValidEmail( $email ) {
	$valid = preg_match( '/^[\w\.\-]+@\w+[\w\.\-]*?\.\w{1,4}$/', $email );

	return $valid;
}

/**
 * Checks if a given string is a valid (from-)name or subject for an email
 *
 * @since		1.0.11
 * @deprecated	1.5
 * @param		string		$string		String to check for validity
 * @return		boolean
 */
function JosIsValidName( $string ) {
	
	$invalid = preg_match( '/[\x00-\x1F\x7F]/', $string );
	if ($invalid) {
		return false;
	} else {
		return true;
	}
}
/**
* Function to create a mail object for futher use (uses phpMailer)
* @param string From e-mail address
* @param string From name
* @param string E-mail subject
* @param string Message body
* @return object Mail object
*/
function mosCreateMail( $from='', $fromname='', $subject, $body ) {

	global $config;
	
	$mosConfig_absolute_path = $config['abs_path'];
	$mosConfig_mailfrom = $config['mail_from'];
	$mosConfig_fromname = $config['mail_from_name'];
	$mosConfig_mailer = "mail";
	
	$mail = new mosPHPMailer();

	$mail->PluginDir = $mosConfig_absolute_path .'/includes/phpmailer/';
	$mail->IsMail();
	$mail->From 	= $from ? $from : $mosConfig_mailfrom;
	$mail->FromName = $fromname ? $fromname : $mosConfig_fromname;
	$mail->Mailer 	= $mosConfig_mailer;
	$mail->Subject 	= $subject;
	$mail->Body 	= $body;
	return $mail;
}

?>