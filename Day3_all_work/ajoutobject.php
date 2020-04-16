<html>
<head>
	<title>ajout objet</title>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" 
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> 
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="ajoutobjet.css"> 
	<script type="text/javascript">   
	$(document).ready(function(){     
	$('.header').height($(window).height());    
	}); 
	</script> 
</head>

<body>
	<nav class="navbar navbar-expand-md">    
		<a class="navbar-brand" href="page_de_presentation.html"><img src="logo.jpg" height="25px"></a>    
		<button class="navbar-toggler navbar-dark" type="button"     
		data-toggle="collapse" data-target="#main-navigation">     
		<span class="navbar-toggler-icon"></span>    
		</button>   

		<div class="collapse navbar-collapse" id="main-navigation">     
		<ul class="navbar-nav">      
			<li class="nav-item"><a class="nav-link" href="categories.html">Catégories</a></li>      
			<li class="nav-item"><a class="nav-link" href="achat.html">Achat</a></li>      
			<li class="nav-item"><a class="nav-link" href="vendre.html">Vendre</a></li>         
			<li class="nav-item"><a class="nav-link" href="panier.html"><img src="panier-vert.jpg" height="25px"></a></li>
		</ul>    
		</div>  
	</nav>

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

<header class="page-header header container-fluid">
		<div class="ombre"></div>      
 			<div class="description">
 			<h3>cliquez <u><b><a href="ajoutobject.html">ici</a></b></u> pour etre redirigé vers la page precedente</h3>
			<br>
			<h3>cliquez <u><b><a href="pageadmin.html">ici</a></b></u> pour etre redirigé vers la page principal</h3><br>
		</div>
</header>

<footer class="page-footer">    
 	<div class="container">     
 		<div class="row">      
 			<div class="col-lg-8 col-md-8 col-sm-12">       
 				<h6 class="text-uppercase font-weight-bold">Informations supplémentaires</h6>
 <p>Ce site a été réalisé par Amandine ZIEGLER, Tom LARNICOL et Lindrit HYSENI</p>      
</div>      
<div class="col-lg-4 col-md-4 col-sm-12">       
	<h6 class="text-uppercase font-weightbold">Contact</h6>
	<p>        
		37, quai de Grenelle, 75015 Paris, France <br>        
		info@webDynamique.ece.fr <br>        
		06 52 64 58 07 <br>        
		06 01 07 13 63 <br>
		06 72 02 46 05  <br>    
	</p>      
</div>    
</div>    
<div class="footer-copyright text-center">&copy; 2020 Copyright | Droit      
d'auteur: webDynamique.ece.fr</div>  
</footer> 
</body> 
</html>
