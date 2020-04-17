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
              echo "<p>  vous etes connecté en tant que admin </p>";
              ?>

              <html>
                <br>cliquez <a href="pageadmin.html">ici <br></a>
              </html>

              <?php
            }
          } else {
          echo "<p>  vous etes connecté en tant que vendeur </p>";
          ?>

          <html>
            <br>cliquez <a href="pagevendeur.html">ici <br></a>
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