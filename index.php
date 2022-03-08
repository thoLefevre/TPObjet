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
    $U1 =new User("toto","12345");
    $U2=new User("tata","azerty");
    $U3=new User("tete","azer");
    $U4=new User("titi","aaaa");
    $U5=new User("tutu","bbbb");

    $TableauUser = array();

        array_push($TableauUser,$U1);
        array_push($TableauUser,$U2);
        array_push($TableauUser,$U3);
        array_push($TableauUser,$U4);
        array_push($TableauUser,$U5);
       
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
