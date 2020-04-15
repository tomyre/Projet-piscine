<!DOCTYPE html>
<html>
<head>
	<title> suppresion objet base de données </title>
	<meta charset='utf-8'>
	<form action="supobjetsuiv.php" method="post" onsubmit="return confirmation();">
    <SCRIPT type="text/javascript">
		function confirmation(){
    return confirm("Êtes-vous sur de vouloir supprimer ce fournisseur ?");}
</SCRIPT>
</head>
<body>
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
            echo '<td class="tdliste">' . $donnees['ID'] . '</td>';
	        echo '<td class="tdliste">' . $donnees['Nom'] . '</td>';
	        echo '<td class="tdliste">' . $donnees["Categorie"] . '<td>';
            }
		echo '</table></div></center>';
            $pdo = null;
         ?>
	<!--Creation d'un compte et ajout dans la base de données-->
	<h1 align="center"> Quel objet voulez vous supprimer( rentrez son ID et son nom) </h1>
	<div id="container">

	    <label> Nom:</label>
	    <input type='text' name='nom' required>

	    <label> ID: </label>
	    <input type='number' name='id' required>

		<input type="submit"  name="button" value="supprimer l'objet">
	</div>
</body>
</html>