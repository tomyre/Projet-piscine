<?php
//récupérer les données venant de formulaire
$titre = isset($_POST["titre"])? $_POST["titre"] : "";
$auteur = isset($_POST["auteur"])? $_POST["auteur"] : "";
$annee = isset($_POST["annee"])? $_POST["annee"] : "";
$editeur = isset($_POST["editeur"])? $_POST["editeur"] : "";

//identifier votre BDD
$database = "livres";

//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//Partie 1: Rechercher un livre//*****************************
// on verifie quel bouton est cliqué
if (isset($_POST['button1']))
	 {if ($db_found) {
	 	//on cree une variable pour ne pas avoir à le reecrire à chaque fois (optimisation du code)
	 	$sql = "SELECT * FROM books";
	 	if ($titre != "") {
	 		$sql .= " WHERE Titre LIKE '%$titre%'"; // on cherche l'endroit où le titre est le même que la requete
	 		if ($auteur != "") {
	 			$sql .= " AND Auteur LIKE '%$auteur%'"; // on cherche AUSSI ou l'auteur est le mme que celui de la requete dans le cas où plusieurs livres ont le meme noms
	 		}
	 	}
	 	$result = mysqli_query($db_handle, $sql);
	 	//regarder s'il y a de résultat
	 	if (mysqli_num_rows($result) == 0) {	 	// retourne le nombre de lignes du resultat et determine si il est egale à 0 ou non
	 		echo "Book not found";
	 	} else {
	 		while ($data = mysqli_fetch_assoc($result)) {
	 			echo "ID: " . $data['ID'] . "<br>";
	 			echo "Titre: " . $data['Titre'] . "<br>";
	 			echo "Auteur: " . $data['Auteur'] . "<br>";
	 			echo "Année: " . $data['Annee'] . "<br>";
	 			echo "Editeur: ". $data['Editeur'] . "<br>";
	 		}
	 	}
	 } else {
	 	echo "Database not found";
	 }
	}

	//Partie 2: Ajouter un livre//*****************************
	if (isset($_POST['button2'])) {
		if ($db_found) {
			$sql = "SELECT * FROM books";
				if ($titre != "") {
					$sql .= " WHERE Titre LIKE '%$titre%'";
						if ($auteur != "") {
							$sql .= " AND Auteur LIKE '%$auteur%'";
							}
						}
						$result = mysqli_query($db_handle, $sql);

						if (mysqli_num_rows($result) != 0) {
						echo "Book alreadyexists. Duplicate not allowed.";
						} else {
						$sql = "INSERT INTO books(Titre, Auteur, Annee, Editeur)VALUES('$titre', '$auteur', '$annee', '$editeur')";
						$result = mysqli_query($db_handle, $sql);
						echo "Add successful. <br>";
						//on afficher le livre ajouté
						$sql = "SELECT * FROM books";
						if ($titre != "") {
							$sql .= " WHERE Titre LIKE '%$titre%'";
							if ($auteur != "") {
								$sql .= " AND Auteur LIKE '%$auteur%'";
							}
						}
						$result = mysqli_query($db_handle, $sql);
						while ($data = mysqli_fetch_assoc($result)) {
							echo "ID: " . $data['ID'] . "<br>";
							echo "Titre: " . $data['Titre'] . "<br>";
							echo "Auteur: " . $data['Auteur'] . "<br>";
							echo "Année: " . $data['Annee'] . "<br>";
							echo "Editeur: " . $data['Editeur'] . "<br>";
						}
					}
				} else {echo "Database not found";
			}
		}


		//Partie 3: Effacer un livre//*****************************
		if (isset($_POST['button3'])) {
			if ($db_found) {
				$sql= "SELECT * FROM books";
				if ($titre != "") {
					$sql .= " WHERE Titre LIKE '%$titre%'";
					if ($auteur != "") {
						$sql .= " AND Auteur LIKE '%$auteur%'";
					}
				}
				$result = mysqli_query($db_handle, $sql);
				if (mysqli_num_rows($result) == 0) {
		//Livre inexistant
					echo "Cannot delete. Book not found. <br>";
				} else {
					while ($data = mysqli_fetch_assoc($result) ) {
						$id = $data['ID'];echo "<br>";
					}
					$sql = "DELETE FROM books";
					$sql .= " WHERE ID = $id";
					$result = mysqli_query($db_handle, $sql);
					echo "Delete successful. <br>";
					//on affiche les autres livres dans la BDD
					$sql = "SELECT * FROM books";$result = $result = mysqli_query($db_handle, $sql);
					echo "Les livres dans notre bibliothèque: <br>";
					while ($data = mysqli_fetch_assoc($result)) {
						echo "ID: " . $data['ID'] . "<br>";
						echo "Titre: " . $data['Titre'] . "<br>";
						echo "Auteur: " . $data['Auteur'] . "<br>";
						echo "Année: " . $data['Annee'] . "<br>";
						echo "Editeur: " . $data['Editeur'] . "<br>";
						echo "<br>";
					}
				}
			} else {
				echo "Database not found";
			}
		}
		//fermer la connexion
		mysqli_close($db_handle);
?>


