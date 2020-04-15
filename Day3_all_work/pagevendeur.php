<!DOCTYPE html>
<html>
<head>
	<title> Compte vendeur</title>
	<meta charset="utf-8">
</head>
<body>
	<h1> Bienvenue dans votre espace vendeur </h1>
<?php
	try		//Connection a la bdd
	{
		$bdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	$reponse = $bdd->query('SELECT * FROM vendeur');
		echo '<div class="liste"><table>';
        echo '<tr>';
		echo '<th class="thliste">ID</th>';
        echo '<th class="thliste">Nom</th>';
        while($donnees = $reponse->fetch()) {	// Renvoit les valeurs de la bdd
			echo '<tr>';
            echo '<td class="tdliste">' . $donnees['ID'] . '</td>';
	        echo '<td class="tdliste">' . $donnees['Nom'] . '</td>';
            }
		echo '</table></div></center>';
            $pdo = null;
?>

<p> Que souhaitez vous faire ? </p>
<ul>
	<li> ajouter un <a href='ajoutobject.html'> objet </a> à vendre </li>
	<li> supprimer un 
</body>
</html>