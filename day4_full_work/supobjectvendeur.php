<!DOCTYPE html>
<html>
<head>
	<title> suppresion objet base de données </title>
	<meta charset='utf-8'>
	<form action="supobjetsuiv.php" method="post" onsubmit="return confirmation();">

		<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" 
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> 
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="supobjet.css"> 
	
	<script type="text/javascript">   
	$(document).ready(function(){     
	$('.header').height($(window).height());    
	}); 
	</script> 

    <SCRIPT type="text/javascript">
		function confirmation(){
    return confirm("Êtes-vous sur de vouloir supprimer ce fournisseur ?");}
</SCRIPT>
</head>

<body>
	<nav class="navbar navbar-expand-md">    
		<a class="navbar-brand" href="pagevendeur.html"><img src="logo.jpg" height="25px"></a>    
		<button class="navbar-toggler navbar-dark" type="button"     
		data-toggle="collapse" data-target="#main-navigation">     
		<span class="navbar-toggler-icon"></span>    
		</button>   

		<div class="collapse navbar-collapse" id="main-navigation">     
		<ul class="navbar-nav">      
			<li class="nav-item"><a class="nav-link" href="#.html">Mon compte</a></li>
 			<li class="nav-item"><a class="nav-link" href="page_de_presentation.html">Déconnexion</a></li>
		</ul>    
		</div>  
	</nav>

	<p> Voici la liste des objets feraille et tresor dans la base de données : </p> 
<?php
	try		//Connection a la bdd
	{
		$bdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	$reponse = $bdd->query("SELECT * FROM article");
		echo '<div class="liste"><table>';
        echo '<tr>';
		echo '<th class="thliste">ID</th>';
        echo '<th class="thliste">Nom</th>';
        echo '<th class="thliste">Categorie</th>';
        while($donnees = $reponse->fetch()) {	// Renvoit les valeurs de la bdd
			echo '<tr>';
            echo '<td class="tdliste">' . $donnees['ID'] . '&nbsp &nbsp' . '</td>';
	        echo '<td class="tdliste">' . $donnees['Nom'] . '&nbsp &nbsp' . '</td>';
	        echo '<td class="tdliste">' . $donnees["Categorie"] . '&nbsp &nbsp' . '<td>';
            }
		echo '</table></div></center>';
            $pdo = null;
         ?>

<header class="page-header header container-fluid">
	<div class="ombre"></div>      
 		<div class="description">
			<h1>Quel objet voulez vous supprimer( rentrez son ID et son nom)</h1>
		</div>
</header>
	
	<div class="container features"> 
 		<div class="row">     
 			<div class="col-lg-12 col-md-12 col-sm-12">
 			<h1><u><b>Supression d'un objet dans la base de données</b></u></h1><br> 

	    		<label> Nom:</label>
	    		<input type='text' name='nom' required>

	    		<label> ID: </label>
	    		<input type='number' name='id' required>

				<input type="submit"  name="button" value="supprimer l'objet">
			</div>
		</div>
	</div>

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