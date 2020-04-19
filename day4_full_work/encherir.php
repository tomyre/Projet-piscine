<?php

//récupérer les données venant de formulaire
$ID = isset($_POST["ID"])? $_POST["ID"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$PrixMax = isset($_POST["PrixMax"])? $_POST["PrixMax"] : "";
$IDAcheteur = isset($_POST["IDAcheteur"])? $_POST["IDAcheteur"] : "";


//identifier votre BDD
$database = "piscine";

//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//lorsque j'appuie sur le bouton je vais chercher dans ma base de données si la même proposition n'a pas déjà été faite
if (isset($_POST['button'])) {
	if ($db_found) {

		$sql = "SELECT * FROM article";
		$sql .= "WHERE IDobjet LIKE '%ID'";
		$result = mysqli_query($db_handle,$sql);
		
		// if (mysqli_num_rows($result) != 0) {


		$sql = "SELECT * FROM encheres";
		$sql .= " WHERE ID LIKE '%$ID%' AND NOM LIKE '%$nom%' AND PrixMax LIKE '%$PrixMax' AND IDAcheteur LIKE '%$IDAcheteur'" ;
		$result = mysqli_query($db_handle,$sql);

		// si le nombres de colonne de mon resultat est different de 0 (= il a trouvé la même proposition) alors la personne a deja faite cette proposition donc je lui dis de faire une autre proposition
		if (mysqli_num_rows($result) != 0) {
		echo "La  proposition sur cet article a déjà été faite, elle est en attente d'examin par l'administrateur";

		// si le resultat est zero je peux alors ajouter une nouvelle proposition aux enchères
		} else {
			$sql = "INSERT INTO encheres(ID, NOM, PrixMax, IDAcheteur)VALUES('$ID','$nom','$PrixMax','$IDAcheteur')";
			$result = mysqli_query($db_handle,$sql);
			echo "Votre  proposition pour ce bien a bien été envoyé. <br>"; 
		}
		// }
		} 
		else {
		echo "Database not found";
		}
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Enchérir</title>
	<meta charset="utf-8">

	<form action="encherir.php" method="post">
	<!--charger bootstrap-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet"
 	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 

	<!-- appeler la partie CSS-->
	<link rel="stylesheet" type="text/css" href="styles_enchérir.css">

	<!--sert au backgroung-->
	<script type="text/javascript">
 		$(document).ready(function(){
 		$('.header').height($(window).height());
		 });
	</script>

</head>

<body>

	<!--barre de navigation en haut de la page-->
	<nav class="navbar navbar-expand-md">
		<a class="navbar-brand" href="pageacheteur.html"><img src="logo.jpg" height="25px"></a>
 		<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
 			<span class="navbar-toggler-icon"></span>
 		</button>
 		<div class="collapse navbar-collapse" id="main-navigation">
 			<ul class="navbar-nav">
 				<li class="nav-item"><a class="nav-link" href="#.html">Mon compte</a></li> 
 				<li class="nav-item"><a class="nav-link" href="page_de_presentation.html">Déconnexion</a></li>
 				<li class="nav-item"><a class="nav-link" href="panier.html"><img src="panier-vert.jpg" height="25px"></a></li>
 			</ul>
		</div>
	</nav>

<!--conteneur de la page-->
	<header class="page-header header container-fluid">

		<!--superposition txt/background-->
		<div class="overlay"></div>
		<div class="description">
				<h3><b>Cliquez <u><a href="enchères.html">ici</a></u> pour retourner au menu des enchères</b></h3>
			
		</div>
	</header>

<!-- bas de page -->
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
		<div class="footer-copyright text-center">&copy; 2020 Copyright | Droit d'auteur: webDynamique.ece.fr</div>
	</div>  
	</footer>

</body>
</html>

