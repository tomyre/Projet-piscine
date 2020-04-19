<!DOCTYPE html>
<html>
<head>
	<title> Cloturation d'une enchère</title>
	<meta charset="utf-8">
	<form action="cloturationencheresuiv.php" method="post">

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
		<a class="navbar-brand" href="pageadmin.html"><img src="logo.jpg" height="25px"></a>    
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

<header class="page-header header container-fluid">
		<div class="ombre"></div>      
 		<div class="description">
			<h1> A quelle enchère voulez vous acceder  ?</h1>
		</div>
</header>

<p> Voici la liste des enchères actuelle : </p>

<?php
//identifier votre BDD
$database = "piscine";

//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
	$sql = "SELECT * FROM article WHERE Categorie = 'Enchere' OR Categorie2 = 'Enchere'";
	$result = mysqli_query($db_handle, $sql);
	if (mysqli_num_rows($result) != 0) {
		?>
		<form>
			<table>
				<tr> 
					<th> ID  &nbsp  &nbsp  &nbsp &nbsp</th>
					<th> Nom de l'objet  </th>
				</tr>
			<?php
			while ($data= mysqli_fetch_assoc($result)) {
			?>
				<tr> 
					<td> <?php echo $data['ID'];?> </td>
					<td> <?php echo $data['Nom'];?>  </td>
				</tr>
			<?php
			}
			?>
			</table>
		</form>
		<?php 
	} else {
		echo "aucun article actuellement en enchère veuilez reesayer plus tard";
	}
} else {
	echo "database not found";
}
mysqli_close($db_handle);
?>
	
	<div class="container features"> 
 		<div class="row">     
 			<div class="col-lg-12 col-md-12 col-sm-12"> 
 				<h1><u><b>Rentrez l'id de l'enchère que vous voulez conclure: </b></u></h1><br>				
				<label> ID: </label>
				<input type='number' name='id' required>
				<br>
				<input type='submit' name='button' value="Acces à l'enchère"> 
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

