<?php

    include('connexionDB.php');
    session_start();
    $nombres_etudiants = $connexion->prepare("SELECT * FROM etudiant");
    $nombres_etudiants->execute();
    $result_etudiants = $nombres_etudiants->rowCount();

    $nombres_filieres = $connexion->prepare("SELECT * FROM filiere");
    $nombres_filieres->execute();
    $result_filieres = $nombres_filieres->rowCount();

    $nombres_annees = $connexion->prepare("SELECT * FROM annee_academique");
    $nombres_annees->execute();
    $result_annees = $nombres_annees->rowCount();

    $nombres_inscriptions = $connexion->prepare("SELECT * FROM inscription");
    $nombres_inscriptions->execute();
    $result_inscriptions = $nombres_inscriptions->rowCount();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>App - Gestion</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="examen/examen.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-default">
        <?php include('navigation.php') ?>
    </nav>
    <div class="container">
        <div style="text-align: right;">
            <h5>Vous êtes connecté M/Mlle <?php echo $_SESSION['nom'].' '.$_SESSION['prenom']; ?></h5>
            <a href="examen/deconnexion.php">
                <button type="button" class="btn rounded-pill btn-info">Deconnectez-vous !</button>
            </a>
        </div>
        <h4 style="text-align: center;">Bienvenue dans notre application de gestion des inscriptions des étudiants !</h4>
        <h4 style="text-align: center;">Ci-dessous nos statistiques.</h4>
        <div class="row">
            <div class="column">
                <div class="card">
                <h3>Etudiants</h3>
                <p><?php echo $result_etudiants?></p>
                </div>
            </div>

            <div class="column">
                <div class="card">
                <h3>Filières</h3>
                <p><?php echo $result_filieres?></p>
                </div>
            </div>
            
            <div class="column">
                <div class="card">
                <h3>Année académiques</h3>
                <p><?php echo $result_annees?></p>
                </div>
            </div>
            
            <div class="column">
                <div class="card">
                <h3>Inscriptions</h3>
                <p><?php echo $result_inscriptions?></p>
                </div>
            </div>
            </div>
        </div>
</body>

</html>