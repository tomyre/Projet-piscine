<?php 
//récupérer les données venant de formulaire
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$ID = isset($_POST["id"])? $_POST["id"] : "";

//identifier votre BDD
$database = "piscine";

//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//affiche la liste des collaborateurs afin d'eviter à l'admin de devoir aller regarder dansla base de données



 //suppression du compte dans la base de données
if (isset($_POST['button'])) {
	if ($db_found) {
	$sql= "SELECT * FROM vendeur";
	$sql .= " WHERE ID LIKE '%$ID%' AND Nom LIKE '%$nom%'";
	$result = mysqli_query($db_handle, $sql);
	if (mysqli_num_rows($result) == 0) {
		//compte inexistant
		echo "compte introuvable dans la base de données. <br>";
		} else {
			while ($data = mysqli_fetch_assoc($result) ) {
			$id = $data['ID'];
			echo "<br>";
			}
			$sql = "DELETE FROM vendeur";
			$sql .= " WHERE ID = $id";
			$result = mysqli_query($db_handle, $sql);
			echo "Delete successful. <br>";
			}
		} else {
		        echo "Database not found";
			}
		}
		
		//fermer la connexion
		mysqli_close($db_handle);
 ?>
  <html>
    <br>cliquez <a href="supfournisseur.php">ici</a> pour etre redirigé vers la page precedente<br>
    <br>cliquez <a href="pageadmin.html">ici  </a> pour etre redirigé vers la page principal<br>
 </html>