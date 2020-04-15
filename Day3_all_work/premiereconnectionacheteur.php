<?php 
//récupérer les données venant de formulaire
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";
$paiement = isset($_POST["class"])? $_POST["class"] : "";
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
$ville = isset($_POST["ville"])? $_POST["ville"] : "";
$codepostal =  isset($_POST["codepostal"])? $_POST["codepostal"] : "";
$telephone = isset($_POST["telephone"])? $_POST["telephone"] : "";
$pays= isset($_POST["pays"])? $_POST["pays"] : "";

//identifier votre BDD
$database = "piscine";

//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//lorsque j'appuie sur le bouton je vais chercher dans ma base de données si un nom avec cette adresse mail existe deja afin de ne pas creer de doublons
if (isset($_POST['button'])) {
	if ($db_found) {
		$sql = "SELECT * FROM acheteur";
		$sql .= " WHERE Nom LIKE '%$nom%' AND email LIKE '%$email%'";
		$result = mysqli_query($db_handle, $sql);
		// si le nombres de colonne de mon resultat est different de 0 (= il a trouvé un compte) alors la personne a deja un compte donc je l'informe de se connceter directement via la page connexion 
		if (mysqli_num_rows($result) != 0) {
			echo "Ce compte existe deja. vous pouvez vous y connecter directement sur la page de presentation.";
			// si le resultat est zero je peux créer un nouveau compte dan sma base de données
			} else {
			$sql = "INSERT INTO acheteur(email, MDP, Nom, Prenom, Adresse, Ville, codepostal, pays, telephone, paiement)VALUES('$email', '$mdp', '$nom', '$prenom', '$adresse', '$ville','$codepostal','$pays','$telephone', '$paiement')";
			$result = mysqli_query($db_handle, $sql);
			echo "Felicitaion, votre compte acheteur à été créé. veuiller vous y connecter via la page de presentation <br>";
			}
		} else {
		echo "Database not found";
		}
	}
 ?>

  <html>
    <br>cliquez <a href="premiereconnectionacheteur.html">ici</a> pour etre redirigé vers la page precedente<br>
    <br>cliquez <a href="page_de_presentation.html">ici </a> pour etre redirigé vers la page principal<br>
 </html>