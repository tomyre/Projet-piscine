<?php 
//récupérer les données venant de formulaire
$categorie = isset($_POST['vente'])? $_POST['vente'] : "";
$categorie2 = isset($_POST['vente2'])? $_POST['vente2'] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$description = isset($_POST["description"])? $_POST["description"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$video = isset($_POST["video"])? $_POST["video"] : "";
$prix = isset($_POST["prix"])? $_POST["prix"] : "";
$choix = isset($_POST["categorie"])? $_POST["categorie"] : "";

//identifier votre BDD
$database = "piscine";

//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button'])) {
	if ($db_found) {
		if ($choix==1){
			$type = 'ferraille' ;
		} else if($choix==2){
			$type = 'bonmusee';
		} else if($choix==3) {
			$type = "accessoirevip";
		}
		if ($categorie==1){
			$Categorie= 'achatimmediat';
		}
		if ($categorie==2){
			$Categorie= 'enchere';
		}
		if ($categorie==3){
			$Categorie= 'meilleureoffre';
		}
		if ($categorie2==1){
			$Categorie2= '';
		}
		if ($categorie2==2){
			$Categorie2= 'achatimmediat';
		}
		if ($categorie2==3){
			$Categorie2= 'enchere';
		}
		if ($categorie2==4){
			$Categorie2= 'meilleur offre';
		}
		if ((($categorie==2)&&($categorie2==4))||(($categorie2==3)&&($categorie==3))){
			echo " impossible d'etre dans la categorie enchere et meilleur offre en même temps .... Reflechis connard";
		} else {
		$sql = "SELECT * FROM article";
		$sql .= " WHERE Nom LIKE '%$nom%' AND description LIKE '%$description%'";
		$result = mysqli_query($db_handle, $sql);
		if (mysqli_num_rows($result) != 0) {
			echo "Cet article existe deja.";
		} else {
			$sql = "INSERT INTO article (Nom,Type,Categorie,Categorie2,prix,Photo,description,video)VALUES('$nom','$type','Categorie','$Categorie2','$prix','$photo','$description','$video')";
			$result = mysqli_query($db_handle, $sql);
			echo "Felicitation, l'objet à bien ete ajouté sur le site dans la table article <br>";
		}
	}
	} else {
		echo "Database not found";
	}
}
    mysqli_close($db_handle); // fermer la connexion
 ?>
  <html>
    <br>cliquez <a href="ajoutobject.html">ici</a> pour etre redirigé vers la page precedente<br>
    <br>cliquez <a href="pageadmin.html">ici  </a> pour etre redirigé vers la page principal<br>
 </html>