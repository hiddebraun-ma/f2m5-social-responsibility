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
class RegistrationController {

	public function aanmelding() {

		$template_engine = get_template_engine();
		echo $template_engine->render('inlog/aanmelding');
    }
    
    public function checkAanmelding() {
        $errors = [];

//Checken of er wel een bestand is geupload
if (!isset($_FILES['image'])) {
    echo 'Geen bestand geupload!';
    exit;
}



// Foutcodes staan in de key: error  
$file_error = $_FILES['image']['error'];
switch ($file_error) {
    case UPLOAD_ERR_OK:
        break;
    case UPLOAD_ERR_NO_FILE:
        $errors[] = 'Er is geen bestand geupload';
        break;
    case UPLOAD_ERR_CANT_WRITE:
        $errors[] = 'Kan niet schrijven naar disk';
        break;
    case UPLOAD_ERR_INI_SIZE:
    case UPLOAD_ERR_FORM_SIZE:
        $errors[] = 'Dit bestand is te groot, pas php.ini aan';
        break;
    default:
        $errors[] = 'Onbekeden fout';
}
// Alleen verder gaan als er nog geen fouten zijn
// Met count() tel je het aantal elementen in een array
if (count($errors) === 0) {
    session_start();
    // De bestandsnaam staat in de key: name
    $file_name = $_FILES['image']['name'];
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $hash = password_hash($password1, PASSWORD_DEFAULT);

    // Grootte in bytes staat in de key: size
    $file_size = $_FILES['image']['size'];
    // De tijdelijke opslag plek staat de key: temp_name
    $file_tmp = $_FILES['image']['tmp_name'];

    // Bestandstype staat in de key: type
    $file_type = $_FILES['image']['type'];


    // Nu nog het bestandstype checken van het geuploade bestand, is het wel echt een afbeelding?
    // Deze bestandstypes accepteren we (https://www.php.net/manual/en/function.exif-imagetype.php)
    
    $valid_image_types = [
        1 => 'gif',
        2 => 'jpg',
        3 => 'png'
    ];
    $image_type = exif_imagetype($file_tmp);
    if ($image_type !== false) {
        // Juiste extensie opzoeken, die gaan we zo gebruiken bij het maken van de nieuwe bestandsnaam
        $file_extension = $valid_image_types[$image_type];
    } else {
        $errors[] = 'Dit is geen afbeelding!';
   
    }
}

if ($file_size > 2097152) {
    $errors[] = 'Het bestand moet kleiner zijn dan 2 MB';
}
//Als er geen fouten zijn dan doorgaan, anders
if (count($errors) === 0) {

    // Random bestandsnaam genereren, om dubbele bestanden te voorkomen.
    $new_filename   = sha1_file($file_tmp) . '.' . $file_extension;
    $final_filename = '../views/uploads/' . $new_filename;

    // met move_uploaded_file verplaats je het tijdelijke bestand naar de uiteindelijke plek
    move_uploaded_file($file_tmp, $final_filename); // dus van tijdelijke bestandsnaam naar de originele naam (in de huidige map);

    // Op deze plek sla je de bestandsnaam en andere gegevens op in je database, dat mag je zelf doen.
    try {
        $mysqli = new mysqli("localhost", "root", "root", "comics"); // aanpassen voor MA-cloud

        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        // $data = [
        //     'image' => $file_name,
        //     'title' => $title,
        //     'prize' => $prize
        // ];

        $sql = "INSERT INTO `users` (`username`, `password`, `email`, `voornaam`, `achternaam`, `image`) VALUES ('".$username."', '".$hash."', '".$email."', '".$voornaam."', '".$achternaam."', '".$new_filename."');";

        $result = $mysqli->query($sql);
        $mysqli->close();
    } catch (PDOException $e) {
        echo "ERROR IN INSERTING DATA! : " . $e->getMessage();
    }
    


    // Stuur de gebruiker door naar een andere pagina
    header('Location: ../homepage.php');
    exit;
}
//////////////////////////////
	}

}

?>