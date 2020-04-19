<?php

//on récupère les données du formulaire
$IDacheteur = isset($_POST["IDacheteur"])? $_POST["IDacheteur"] : "";
$ID = isset($_POST["ID"])? $_POST["ID"] : "";
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
$Prix = isset($_POST["Prix"])? $_POST["Prix"] : "";

//identification de la bdd
$database = "piscine";

//connexion à la bdd
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//lorsque j'appuie sur le bouton je vais chercher dans ma base de données si la même Offre n'a pas déjà été faite
if (isset($_POST['button'])) {

	if ($db_found) {
		$sql = "SELECT * FROM article";
		$sql .= "WHERE Nom LIKE '%Nom'";
		$result = mysqli_query($db_handle, $sql);

		//if (mysqli_num_rows($result) != 0) {
		$sql = "SELECT * FROM offres";
		$sql .= " WHERE IDacheteur LIKE '%$IDacheteur%' AND ID LIKE '%$ID%' AND Nom LIKE '%$Nom' AND Prix LIKE '%$Prix'" ;
		$result = mysqli_query($db_handle, $sql);

		if (mysqli_num_rows($result) != 0) {
		echo "Une offre pour cet article a déjà été faite, elle est en négociation avec le vendeur";

		} else {
			$sql = "INSERT INTO offres(IDacheteur, ID, Nom, Prix)VALUES('$IDacheteur','$ID','$Nom','$Prix')";
			$result = mysqli_query($db_handle,$sql);
			echo "Votre offre a bien été transmise au vendeur. <br>"; 
		}
		//}
		} else {
		echo "Database not found";
		}
	}
 ?>


<html>
	<body>
		<p>Cliquez <a href="#">ici</a> pour retourner au menu des enchères</p>
	</body>
</html>