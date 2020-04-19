
<?php 
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
		$sql .= " WHERE IDassocie LIKE '%$ID%'";
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
						<?php $number= $number + $data['prix']; $article = $article + 1 ;?> 
					</tr>
				</table>
			</form>
			</html>

			<?php 
			}
			if ($article == 1){
			?>

			<html>
			<head>
 			<form action="suppressionobjetpanier.php" method="post" onsubmit="return confirmation2();"> 

 			<Script type="text/javascript">
				function confirmation2(){
    			return confirm("Êtes-vous sur de vouloir passer commande ?");}
 			</Script>
			</head>
				<p> Le total de votre panier est de  <?php echo $number ; ?> euros pour <?php echo $article ?> article </p> <br>
				<input type="submit" name="button2" value="Passer à la commande">
			</html>

			<?php
			} else {
				?>
				<html>
				<head>
 				<form onsubmit="return confirmation2();"> 

 				<Script type="text/javascript">
					function confirmation2(){
    				return confirm("Êtes-vous sur de vouloir passer commande ?");}
 				</Script>
				</head>
				<p> Le total de votre panier est de  <?php echo $number ; ?> euros pour <?php echo $article ?> articles</p> <br>
				<input type="submit" name="button2" value="Passer à la commande" <?php while ($data= mysqli_fetch_assoc($result)) {
						$sql = "DELETE FROM article";
						$sql .= "WHERE IDassocie LIKE '%$ID%' ";
						$result = mysqli_query($db_handle, $sql);
						echo "Merci d'avoir acheté sur notre site, vos articles vous serons envoyé sous 72h . <br>";
					} ?> >
				</html>
				
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
