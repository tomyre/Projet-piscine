<html>
<head>
	<title> suppression objet suiv</title>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" 
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> 
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="supobjetsuiv.css"> 
	
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
$type = isset($_POST['class'])? $_POST['class'] : "";

//identifier votre BDD
$database = "piscine";

//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//lorsque j'appuie sur le bouton je vais chercher dans ma base de données si un nom avec cette adresse mail existe deja afin de ne pas creer de doublons
if (isset($_POST['button'])) {
	if ($db_found) {
			$sql = "SELECT * FROM article";
			$sql .= " WHERE Nom LIKE '%$nom%' AND ID LIKE '%$ID%'";
			$result = mysqli_query($db_handle, $sql);
			// si le nombres de colonne de mon resultat est different de 0 (= il a trouvé un compte) alors la personne a deja un compte donc je l'informe de se connceter directement via la page connexion 
			if (mysqli_num_rows($result) == 0) {
				echo "Objet introuvable dans la base de données. <br>";
				// si le resultat est zero je peux créer un nouveau compte dan sma base de données
				} else {
					while ($data = mysqli_fetch_assoc($result) ) {
					$id = $data['ID'];
					echo "<br>";
				}
				$sql = "DELETE FROM article";
				$sql .= " WHERE ID = $id";
				$result = mysqli_query($db_handle, $sql);
				echo "le bien à été supprimé. <br>";
				}	
			} else {
		  		echo "Database not found";
		}
	}
 ?>
 
<header class="page-header header container-fluid">
		<div class="ombre"></div>      
 			<div class="description">
 			<h3>cliquez <u><b><a href="supobject.php">ici</a></b></u> pour etre redirigé vers la page precedente</h3>
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
