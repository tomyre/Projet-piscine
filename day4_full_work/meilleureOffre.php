<?php

	//id la bdd utile
	$database = 'piscine';
	//connection à la bdd
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if (isset($_POST["button1"])) {

	if ($db_handle) {

		$sql = "SELECT * FROM article WHERE Categorie = 'Offre'";

		$result = mysqli_query($db_handle, $sql);

?> 

<html>

<head>
	<title>Achetez-le maintenant</title>
	<meta charset="utf-8">

	<!--charger bootstrap-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet"
 	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 

	<!-- appeler la partie CSS-->
	<link rel="stylesheet" type="text/css" href="styles_meilleureOffre.css">

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
 				<li class="nav-item"><a class="nav-link" href="catégories.html">Catégories</a></li>   
 				<li class="nav-item"><a class="nav-link" href="vendre.html">Vendre</a></li>
				<li class="nav-item"><a class="nav-link" href="choixdroit.html">Creer un compte</a></li>
				<li class="nav-item"><a class="nav-link" href="connexion.html"> Se connecter</a></li>        
				<li class="nav-item"><a class="nav-link" href="panier.html"><img src="panier-vert.jpg" height="25px"></a></li>
 			</ul>
		</div>
	</nav>


	<!--conteneur de la page-->
	<header class="page-header header container-fluid">

		<!--superposition txt/background-->
		<div class="overlay"></div>
		<div class="description">
			<h1>Découvrez tous nos articles disponibles pour un achat immédiat ci-dessous.</h1>
		</div>
	</header>

	<div class="container features"> 
 		<div class="row">     
 			<div class="col-lg-12 col-md-12 col-sm-12"> 

			<table>
				<tr>
           			<th>Photo &nbsp &nbsp &nbsp &nbsp</th>
           			<th>ID &nbsp &nbsp &nbsp &nbsp</th>
           			<th>Nom &nbsp &nbsp &nbsp &nbsp</th>
           			<th>Catégorie &nbsp &nbsp &nbsp &nbsp</th>
           			<th>Prix &nbsp &nbsp &nbsp &nbsp</th>
           			<th>Description &nbsp &nbsp &nbsp &nbsp</th>
       			</tr>

<?php
	while($data = mysqli_fetch_assoc($result)) {
?>
				<tr>
					<td><img src="<?php echo $data['Photo'];?>" Height="100"></td>
					<td><?php echo $data['ID'];?></td>
					<td><?php echo $data['Nom'];?></td>
					<td><?php echo $data['Type'];?></td>
					<td><?php echo $data['prix'];?></td>
					<td><?php echo $data['description'];?></td>
				</tr>
<?php
	}
?>
			</table>
			</div>
		</div>
	</div>


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


<?php
		}

	} else {
		echo "Database not found. <br>";
	}
?>