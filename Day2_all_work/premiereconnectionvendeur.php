<?php 
//récupérer les données venant de formulaire
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";

//identifier votre BDD
$database = "piscine";

//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button'])) {
	if ($db_found) {
		$sql = "SELECT * FROM vendeur";
		$sql .= " WHERE Nom LIKE '%$nom%' AND email LIKE '%$email%'";
		$result = mysqli_query($db_handle, $sql);
        if (mysqli_num_rows($result) != 0) {
			echo "Ce compte existe deja. vous pouvez vous y connecter directement sur la page de presentation.";
			} else {
			$sql = "INSERT INTO vendeur(Nom, Prenom, email, MDP, photo)VALUES('$nom', '$prenom', '$email', '$mdp','$photo')";
			$result = mysqli_query($db_handle, $sql);
			echo "Felicitations, votre compte vendeur à été créé. veuiller vous y connecter via la page de presentation. <br>";
			}
		} else {
		echo "Database not found";
		}
	}
 ?>