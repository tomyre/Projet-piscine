<?php

$email = isset($_POST['email'])? $_POST["email"] : "";
$MDP = isset($_POST['mdp'])? $_POST["mdp"] : "";

  // connexion à la base de données
  $database = "piscine";

  $db_handle = mysqli_connect('localhost', 'root', '');
  $db_found = mysqli_select_db($db_handle, $database);

// Lorsque l'on cree un compte il faut regarder dans chaque table de la base de données si elel existe et pour cela je fais 3 boucle successives me permettant de parcours ces tables.
  if(isset($_POST['button']))
   {if($db_found) { 
      $sql = "SELECT * FROM acheteur ";
      $sql.= " WHERE email LIKE '%$email%' AND MDP LIKE '%$MDP%'";
      $result = mysqli_query($db_handle, $sql);
        if (mysqli_num_rows($result) == 0) {
          $sql2 = "SELECT * FROM vendeur ";
          $sql2 .= " WHERE email LIKE '%$email%' AND MDP LIKE '%$MDP%'";
          $result2 = mysqli_query($db_handle, $sql2);
          if (mysqli_num_rows($result2) == 0) {
            $sql3 = "SELECT * FROM admin ";
            $sql3 .= " WHERE email LIKE '%$email%' AND MDP LIKE '%$MDP%'";
            $result3 = mysqli_query($db_handle, $sql3);
            if (mysqli_num_rows($result3) == 0) {
             echo "<p> aucun compte enregistré avec cette adresse email, veuillez recommencer </p>";
             ?>

              <html>
                <br>cliquez <a href="connexion.html">ici <br></a>
              </html>

              <?php
            } else {
              echo "<p>  Vous etes connecté en tant que admin </p>";
              ?>

              <html>
                <br>cliquez <a href="pageadmin.html">ici <br></a>
              </html>

              <?php
            }
          } else {
            $sql5 = "SELECT * FROM vendeur ";
            $sql5 .= " WHERE email LIKE '%$email%' AND MDP LIKE '%$MDP%'";
            $result5 = mysqli_query($db_handle, $sql2);
            $data = mysqli_fetch_assoc($result2);
            $ID= $data['ID'];

         ?>

<html>
<head>
  <title> suppression fournisseur</title>
  <meta charset="utf-8">
 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> 
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
  
  <link rel="stylesheet" type="text/css" href="pagevendeur.css"> 
  <script type="text/javascript">   
  $(document).ready(function(){     
  $('.header').height($(window).height());    
  }); 
  </script> 

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
      <li class="nav-item"><a class="nav-link" href="#">Mon Compte</a></li>      
      <li class="nav-item"><a class="nav-link" href="page_de_presentation.html">Déconnexion</a></li>      
    </ul>    
    </div>  
  </nav>

  <header class="page-header header container-fluid">
    <div class="ombre"></div>      
    <div class="description">
      <h1> <?php echo "Vous etes connecté en tant que vendeur  et votre ID est " .$ID .", merci de le noter pour la suite des actions. </p>"; ?> </h1>
            <h1><img src="<?php echo $data['photo'];?>" height="100" width="100"> </h1>
    </div>
  </header>
  <div class="container features"> 
  <div class="row">     
    <div class="col-lg-12 col-md-12 col-sm-12">
        <button class="btn btn-outline-secondary btn-lg"><a href='ajoutobjectvendeur.html'>Ajouter un nouvel objet</a></button>
        <button class="btn btn-outline-secondary btn-lg"><a href='supobjectvendeur.php'>Supprimer un objet</a></button> 
      
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

          </html>

          <?php
          } 
        } else {
        echo " vous etes connecté en tant que acheteur <br>";
        ?>

        <html>
          <br>cliquez <a href="pageacheteur.html">ici <br></a>
        </html>

        <?php
        }
      } else {
        echo "Database not found" ;
      }
    }
    mysqli_close($db_handle); // fermer la connexion
?>