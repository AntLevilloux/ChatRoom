<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion | Chat</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <?php
            if(isset($_POST['button_inscription'])){
                include "connexion_bdd.php";
                $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
                $mdp1 = trim($_POST['mdp1']);
                $mdp2 = trim($_POST['mdp2']);

                if(filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($mdp1) && !empty($mdp2) && $mdp1 === $mdp2){
                    $req = mysqli_query($con , "SELECT * FROM utilisateurs WHERE email = '$email'");

                    if(mysqli_num_rows($req) == 0){
                        $hashedPassword = password_hash($mdp1, PASSWORD_DEFAULT);
                        $req = mysqli_query($con , "INSERT INTO utilisateurs (id_u, email, mdp) VALUES (NULL, '$email' , '$hashedPassword') ");

                        if($req){
                            $_SESSION['message'] = "<p class='message_inscription'>Votre compte a été créer avec succès !</p>" ;
                            header("Location:index.php") ;
                        }else {
                            $error = "Inscription Echouée !";
                        }
                    }else {
                        $error = "Cet Email existe déjà !";
                    }
                }else {
                    $error = "Veuillez remplir tous les champs correctement !";
                }
            }
        ?>
        <form action="" method="POST" class="form_connexion_inscription">
            <h1>INSCRIPTION</h1>
            <p class="message_error">
                <?php 
                    if(isset($error)){
                        echo $error ;
                    }
                ?>
            </p>
            <label>Adresse Mail</label>
            <input type="email" name="email">
         
            <label>Mots de passe</label>
            <input type="password" name="mdp1" class="mdp1">
            <label>Confirmation Mots de passe</label>
            <input type="password" name="mdp2" class="mdp2">
            <input type="submit" value="Inscription" name="button_inscription">
            <p class="link">Vous avez un compte ? <a href="index.php">Se connecter</a></p>
        </form>
        <script src="script.js"></script>
    </body>
</html>