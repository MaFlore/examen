<?php
    session_start();
    include_once('connexionDB.php');

    if (isset($_POST['authentifier'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $requete = 'SELECT * FROM users WHERE username=:username AND password=:password';
        $reponse = $connexion->prepare($requete);
        $reponse->execute(
            array(
                'username'=>$username,
                'password'=>$password
            )
        );

        $donnee = $reponse->fetch(PDO::FETCH_OBJ);
        $count = $reponse->rowCount();
        if ($count > 0) {

            $_SESSION['nom'] = $donnee->nom;
            $_SESSION['prenom'] = $donnee->prenom;

            header("Location: /examen/accueil.php");

        } else {

            header('Location: /examen/index.php');

        }
    } 
?>