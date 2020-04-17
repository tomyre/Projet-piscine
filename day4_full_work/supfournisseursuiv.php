<html>
<head>
	<title> suppression fournisseur suiv</title>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" 
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> 
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
	
	<link rel="stylesheet" type="text/css" href="supfournisseur.css"> 
	
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

	<header class="page-header header container-fluid">
		<div class="ombre"></div>      
 			<div class="description">
			<h3>cliquez <u><b><a href="supfournisseur.php">ici</a></b></u> pour etre redirigé vers la page precedente</h3>
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