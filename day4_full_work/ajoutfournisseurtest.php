<?php 
//récupérer les données venant de formulaire
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
$photo = isset($_POST['photo'])? $_POST['photo'] : "" ;

//identifier votre BDD
$database = "piscine";

//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//lorsque j'appuie sur le bouton je vais chercher dans ma base de données si un nom avec cette adresse mail existe deja afin de ne pas creer de doublons
if (isset($_POST['button'])) {
	if ($db_found) {
		$sql = "SELECT * FROM vendeur";
		$sql .= " WHERE Nom LIKE '%$nom%' AND email LIKE '%$email%'";
		$result = mysqli_query($db_handle, $sql);
		// si le nombres de colonne de mon resultat est different de 0 (= il a trouvé un compte) alors la personne a deja un compte donc je l'informe de se connceter directement via la page connexion 
		if (mysqli_num_rows($result) != 0) {
			echo "Ce compte vendeur existe deja. veuillez rentrez un autre fournisseur ";
			// si le resultat est zero je peux créer un nouveau compte dan sma base de données
			} else {
			$sql = "INSERT INTO vendeur(Nom, Prenom, email, MDP, photo)VALUES('$nom', '$prenom', '$email', '$mdp','$photo')";
			$result = mysqli_query($db_handle, $sql);
			echo "Felicitations, le compte fournisseur à été créé et ajouté à la base de données.Il peut maintenant ajoter des produits depuis son compte <br>";
			$data = mysqli_fetch_assoc($result);
				echo "ID: " .$data['ID']; 
			}
		} else {
		echo "Database not found";
		}
	}
 ?>
 
<html>
<head>
	<title> Ajout fournisseur</title>
	<meta charset="utf-8">
	<!--<form action="ajoutfournisseur.php" method="post"> -->
</head>
<body>
	<h1 align="center"> Remplisser les champs suivantes afin d'ajouter un compte dans la base de données </h1>
	<div id="container">
		<label> Prenom: </label>
		<input type='text' name='prenom' required>

	    <label> Nom: </label>
	    <input type='text' name='nom' required>

		<label> identifiant(email): </label>
		<input type='text' name='email' required>
		
		<label> Mot de passe: </label>
		<input type='password' name='mdp' required>
	
		<label> photo : </label>
		<input type='text' name='photo' required>

		<input type="submit" name="button" value="Créer le compte">
	</div>
</body>
</html>