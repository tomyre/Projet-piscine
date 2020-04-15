<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Liste des fiches de procédures</title>
	</head>
	
	<body>
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
            while($donnees = $reponse->fetch())	// Renvoit les valeurs de la bdd
            {
				echo '<tr>';
                    echo '<td class="tdliste">' . $donnees['ID'] . '</td>';
				    echo '<td class="tdliste">' . $donnees['Nom'] . '</td>';
            }
		echo '</table></div></center>';
            $pdo = null;
        ?>
		</div>
    </body>
</html>