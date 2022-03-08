<?php include ("User.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
    <form action="" method="Post">
            login<input type="text" name="login">
            mdp<input type="text" name="mdp">
            <input type="submit" name="connexion" value="ok">
        </form>
    
    
    <?php
      $TableauUser = array();
      try {
          

          $bdd = new PDO('mysql:host=192.168.65.47;dbname=User', 'UserWEB', 'UserWEB');
          $req = "SELECT * from User";
          $reponses = $bdd->query($req);
          while ($donnees = $reponses->fetch())
          {
              echo '<p>' .$donnees['id']  . "  ". $donnees['login'] . "  ". $donnees['mdp'] . '</p>';
              array_push($TableauUser,new User($donnees['id'],$donnees['login'],$donnees['mdp']));
          } 

      } catch (Exception $e) {
          echo 'Exception reçue : ',  $e->getMessage(), "\n";
      }
      

        if(isset($_POST["connexion"])){
        $trouve = false;
        foreach ($TableauUser as  $TheUser)
    {
        if($TheUser->getNom()==$_POST['login']){
            $trouve = true;
            //on va vérifier le mdp du formulaire avec celui de user trouvé
            if($TheUser->seconnecter($_POST['mdp'])){
                ?>
                <h2>Vous etes connect</h2>
                <?php
            }else{
                ?>
                <h2>Mauvais Mot de passe</h2>
                <?php
            }
        }
    }
    if(!$trouve){
        echo "User Inconnu vérifier othographe";
    }
}
    ?>
</body>
</html>
