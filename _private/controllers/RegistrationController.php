<?php

namespace Website\Controllers;

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
		$errors = [];
		$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
		$password = trim($_POST['password']);
		// $voornaam = $_POST['voornaam'];
		// $achternaam = $_POST['achternaam'];

		//check of het email dat is ingevoerd geldig is
		if ($email === false) {
			$errors['email'] = "Dit is een valse e-mail!";
		}

		//check of het wachtwoord minimaal 6 tekens heeft
		if (empty($password) || strlen($password) < 6) {
			$errors['password'] = "Het wachtwoord moet meer dan 6 tekens hebben!";
		}

		if (count($errors) === 0) {
			//informatie opslaan

			//checken of de gebruiken bestaat
			$connection = dbConnect();
			$sql = "SELECT * FROM `user` WHERE `email` = :email";
			$statement = $connection->prepare($sql);
			$statement->execute(['email' => $email]);
			if ($statement->rowCount() === 0) {
				//zo niet, door met opslaan
				$sql = "INSERT INTO `user` (`email`, `password`) VALUES (:email, :password)";
				$statement = $connection->prepare($sql);
				$safe_password = password_hash($password, PASSWORD_DEFAULT);
				$params = [
					'email' => $email,
					'password' => $safe_password
					// 'voornaam' => $voornaam,
					// 'achternaam' => $achternaam
				];
				$statement->execute($params);
				echo "klaar";
				exit;
			} else {
				//anders foutmelding tonen
				$errors['email'] = "Dit account bestaat al";
			}
		}
		print_r($errors);
		$template_engine = get_template_engine();
		echo $template_engine->render('aanmelding', ['errors' => $errors]);
		
	}
}