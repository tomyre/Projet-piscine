<html>
<head>
	<title> suppression fournisseur</title>
	<meta charset="utf-8">
	<form action="supfournisseursuiv.php" method="post" onsubmit="return confirmation();">

    <SCRIPT type="text/javascript">
		function confirmation(){
    return confirm("Êtes-vous sur de vouloir supprimer ce fournisseur ?");}
   </SCRIPT>
</head>

<body>
<p> Voici la liste des fournisseurs actuelle : </p>
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

<h1 align="center"> Quel fournisseur voulez vous supprimer ?</h1>
	<div id="container">
		<label> ID: </label>
		<input type='number' name='id' required>

		<label> Nom: </label>
		<input type='text' name='nom' required>

		<input type="submit" name="button" value="Supprimer le compte"> 
	</div>
</body>
</html>