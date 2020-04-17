<html>
<head>
 <form action="suppressionobjetpanier.php" method='post' onsubmit="return confirmation();">

 <SCRIPT type="text/javascript">
		function confirmation(){
    return confirm("Êtes-vous sur de vouloir supprimer ce fournisseur ?");}
 </SCRIPT>
</head>
</html>
<?php 

// bouton payer ( obligé de payer avec le moyen qu'il a enregirstré en creant son compte) + message jquery pour ultime validation validation 
// lorsque bouton appuyé tout les article disparaissent de la base de données et donc du panier 


//récupérer les données venant de formulaire
$ID = isset($_POST['ID'])? $_POST['ID'] : "";
$number = 0;
$article = 0;

//identifier votre BDD
$database = "piscine";

//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button'])) {
	if ($db_found) {
		$sql = "SELECT * FROM article";
		$sql .= " WHERE ID_associe LIKE '%$ID%'";
		$result = mysqli_query($db_handle, $sql);
		if (mysqli_num_rows($result) != 0) {
			while ($data= mysqli_fetch_assoc($result)) {
			?>

			<html>
			<form>
				<table>
					<tr> 
						<td> <img src="<?php echo $data['Photo'];?>" height="50" width="50"></td>
						<td> <?php echo $data['Nom'];?> </td>
						<td> <?php echo $data['prix']; $number= $number + $data['prix']; $article = $article + 1 ;?> </td>
					</tr>
				</table>
			</form>
			</html>

			<?php 
			}
			if ($article == 1){
			?>

			<p> Le total de votre panier est de  <?php echo $number ; ?> euros pour <?php echo $article ?> article</p> <br>
			<input type="submit" name="button" value="Payer">

			<?php
			} else {
				?>

				<p> Le total de votre panier est de  <?php echo $number ; ?> euros pour <?php echo $article ?> articles</p> <br>
				<input type="submit" name="button" value="Payer">
				
				<?php
		 	}		
		} else {
			echo "aucun article dans votre panier, allez faire quelques achats et revenez ensuite ;) ";
		}
	} else {
		echo" Database not found";
	}
}
?>
