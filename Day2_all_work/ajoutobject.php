<?php 
//récupérer les données venant de formulaire
$type = isset($_POST['class'])? $_POST['class'] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$description = isset($_POST["description"])? $_POST["description"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$paiement = isset($_POST["class"])? $_POST["class"] : "";
$video = isset($_POST["video"])? $_POST["video"] : "";
$prix = isset($_POST["prix"])? $_POST["prix"] : "";

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
			$sql .= " WHERE nom LIKE '%$nom%' AND description LIKE '%$description%'";
			$result = mysqli_query($db_handle, $sql);
			// si le nombres de colonne de mon resultat est different de 0 (= il a trouvé un compte) alors la personne a deja un compte donc je l'informe de se connceter directement via la page connexion 
			if (mysqli_num_rows($result) != 0) {
				echo "Cet article existe deja.";
				// si le resultat est zero je peux créer un nouveau compte dan sma base de données
				} else {
					$sql = "INSERT INTO ferailletresor ( Nom, Photo, Description, Prix, video)VALUES('$nom', '$photo', '$description', '$prix','$video')";
					$result = mysqli_query($db_handle, $sql);
					echo "Felicitaion, l'objet à bien ete ajouté sur le site dans la categorie feraille/tresor<br>";
					}
			} else if ($type == '2'){
				$sql = "SELECT * FROM bonmusee";
				$sql .= " WHERE nom LIKE '%$nom%' AND description LIKE '%$description%'";
				$result = mysqli_query($db_handle, $sql);
				// si le nombres de colonne de mon resultat est different de 0 (= il a trouvé un compte) alors la personne a deja un compte donc je l'informe de se connceter directement via la page connexion 
				if (mysqli_num_rows($result) != 0) {
					echo "Cet article existe deja.";
					// si le resultat est zero je peux créer un nouveau compte dan sma base de données
					} else {
						$sql = "INSERT INTO bonmusee ( Nom, Photo, Description, Prix, video)VALUES('$nom', '$photo', '$description', '$prix','$video')";
						$result = mysqli_query($db_handle, $sql);
						echo "Felicitaion, l'objet à bien ete ajouté sur le site dans la categorie bonmusee <br>";
						}
			} else if ($type == '3'){
				$sql = "SELECT * FROM accesoirevip";
				$sql .= " WHERE nom LIKE '%$nom%' AND description LIKE '%$description%'";
				$result = mysqli_query($db_handle, $sql);
				// si le nombres de colonne de mon resultat est different de 0 (= il a trouvé un compte) alors la personne a deja un compte donc je l'informe de se connceter directement via la page connexion 
				if (mysqli_num_rows($result) != 0) {
					echo "Cet article existe deja.";
					// si le resultat est zero je peux créer un nouveau compte dans ma base de données
					} else {
						$sql = "INSERT INTO accesoirevip ( Nom, Photo, Description, Prix, video)VALUES('$nom', '$photo', '$description', '$prix','$video')";
						$result = mysqli_query($db_handle, $sql);
						echo "Felicitaion, l'objet à bien ete ajouté sur le site dans la categorie accesoirevip <br>";
						}
					}
				} else {
		  echo "Database not found";
		}
	}
 ?>