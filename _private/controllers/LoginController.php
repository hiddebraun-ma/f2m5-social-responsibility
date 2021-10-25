<?php

namespace Website\Controllers;

use mysqli;

/**
* Dit handelt het login
 *
 */
class LoginController
{

	public function loginForm()
	{

		$template_engine = get_template_engine();
		echo $template_engine->render('login_form');
	}

	public function handleLoginForm(){
		//form valideren: email en wachtwoord ingevuld?
		$result = validateRegistrationData($_POST);

		//checken: bestaat gebruiken met email?
		if(userNotRegistered($result['data']['email'] ) ){
			$result['data']['email'] = 'deze gebruiker is niet bekend';
		} else{
			//controleren wachtwoord klopt (password_verify)
			$user = getUserByEmail($result['data']['email']);

			if(password_verify($result['data']['password'], $user['password'])){

				//gebruiker inloggen
				loginUser($user);

				//gebruiker doorsturen naar ingelogde pagina
				redirect(url('login.dashboard'));

			} else{
				//anders foutmelding tonen
				$result['errors']['password'] = 'wachtwoord is niet correct';
			}


		}


		$template_engine = get_template_engine();
		echo $template_engine->render('login_form', ['errors' => $result['errors']]);
	}

	public function userDashboard(){
		//checken of je bent ingelogd
		loginCheck();

		$template_engine = get_template_engine();
		echo $template_engine->render('user_dashboard');
	}

	public function logout(){
		logoutUser();
		redirect(url('home'));
	}
}