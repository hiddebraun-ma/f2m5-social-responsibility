<?php

namespace Website\Controllers;

use mysqli;

/**
* Dit handelt het mail
 *
 */
class EmailController
{

	public function sendTestEmail()
	{

		$mailer = getSwiftMailer();

		$message = createEmailMessage('raphaelrebel@live.com', "Dit is een test email", "Raphael Rebel", 'raphaelrebel@live.com');
		$message->setBody('Dit is de inhoud van mijn test mail!');

		$aantal_verstuurd = $mailer->send($message);

		echo "Aantal = " . $aantal_verstuurd;
		
		
		// $template_engine = get_template_engine();
		// echo $template_engine->render('login_form');
	}

}