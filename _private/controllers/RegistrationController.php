<?php

namespace Website\Controllers;

use mysqli;

/**
 * Class WebsiteController
 *
 * Deze handelt de logica van de homepage af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class RegistrationController
{

	public function aanmelding()
	{

		$template_engine = get_template_engine();
		echo $template_engine->render('aanmelding');
	}
	public function checkAanmelding()
	{
	$result = validateRegistrationData($_POST);


		if (count($result['errors']) === 0) {
			//informatie opslaan

			//checken of de gebruiken bestaat
			if (userNotRegistered($result['data']['email'])) {

				//verificatie code
				$code = md5(uniqid (rand(), true) );
			

				createUser($result['data']['email'], $result['data']['password'], $code);

				//bevestigingsmail versturen

				//stuur user door naar bedankt pagina
				$bedanktUrl = url('aanmelding.bedankt');
				redirect($bedanktUrl);
				
			} else {
				//anders foutmelding tonen
				$errors['email'] = "Dit account bestaat al";
			}
		}
		$template_engine = get_template_engine();
		echo $template_engine->render('aanmelding', ['errors' => $result['errors']]);
		
	}

	public function bedanktAanmelding(){
		$template_engine = get_template_engine();
		echo $template_engine->render('bedankt');
	}

	public function confirmRegistration($code){
		//Hier code lezen
		//Gebruiker ophalen
		$user = getUserByCode($code);
		if ($user === false){
			echo "Onbekende gebruiker, ben je al bevestigd?";
			exit;
		}

		//Gebruiker activeren: code leegmaken
		confirmAccount($code);

		//Doorsturen naar bevestiging pagina
		$template_engine = get_template_engine();
		echo $template_engine->render('register_confirmed');

	}
}
