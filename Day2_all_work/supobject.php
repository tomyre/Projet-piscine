<?php 
//récupérer les données venant de formulaire
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$ID = isset($_POST["id"])? $_POST["id"] : "";
$type = isset($_POST['class'])? $_POST['class'] : "";

//identifier votre BDD
$database = "piscine";

//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//lorsque j'appuie sur le bouton je vais chercher dans ma base de données si un nom avec cette adresse mail existe deja afin de ne pas creer de doublons
if (isset($_POST['button'])) {
	if ($db_found) {
		if ($type == '1'){
			$sql = "SELECT * FROM ferailletresor";
			$sql .= " WHERE Nom LIKE '%$nom%' AND ID LIKE '%$ID%'";
			$result = mysqli_query($db_handle, $sql);
			// si le nombres de colonne de mon resultat est different de 0 (= il a trouvé un compte) alors la personne a deja un compte donc je l'informe de se connceter directement via la page connexion 
			if (mysqli_num_rows($result) == 0) {
				echo "Objet introuvable dans la base de données.";
				// si le resultat est zero je peux créer un nouveau compte dan sma base de données
				} else {
					while ($data = mysqli_fetch_assoc($result) ) {
					$id = $data['ID'];
					echo "<br>";
				}
				$sql = "DELETE FROM ferailletresor";
				$sql .= " WHERE ID = $id";
				$result = mysqli_query($db_handle, $sql);
				echo "le bien à été supprimé. <br>";
				}	
			} else if ($type == '2'){
				$sql = "SELECT * FROM bonmusee";
				$sql .= " WHERE Nom LIKE '%$nom%' AND ID LIKE '%$ID%'";
				$result = mysqli_query($db_handle, $sql);
				// si le nombres de colonne de mon resultat est different de 0 (= il a trouvé un compte) alors la personne a deja un compte donc je l'informe de se connceter directement via la page connexion 
				if (mysqli_num_rows($result) == 0) {
					echo "Objet introuvable dans la base de données.";
					// si le resultat est zero je peux créer un nouveau compte dan sma base de données
					} else {
						while ($data = mysqli_fetch_assoc($result) ) {
						$id = $data['ID'];
						echo "<br>";
					}
					$sql = "DELETE FROM bonmusee";
					$sql .= " WHERE ID = $id";
					$result = mysqli_query($db_handle, $sql);
					echo "le bien à été supprimé. <br>";
				}
			} else if ($type == '3'){
				$sql = "SELECT * FROM accesoirevip";
				$sql .= " WHERE Nom LIKE '%$nom%' AND ID LIKE '%$ID%'";
				$result = mysqli_query($db_handle, $sql);
				// si le nombres de colonne de mon resultat est different de 0 (= il a trouvé un compte) alors la personne a deja un compte donc je l'informe de se connceter directement via la page connexion 
				if (mysqli_num_rows($result) == 0) {
					echo "Objet introuvable dans la base de données.";
					// si le resultat est zero je peux créer un nouveau compte dans ma base de données
					} else {
					while ($data = mysqli_fetch_assoc($result) ) {
						$id = $data['ID'];
						echo "<br>";
					}
					$sql = "DELETE FROM accesoirevip";
					$sql .= " WHERE ID = $id";
					$result = mysqli_query($db_handle, $sql);
					echo "le bien à été supprimé. <br>";
					}
				}
			} else {
		  		echo "Database not found";
		}
	}
 ?>