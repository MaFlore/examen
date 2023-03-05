<?php 
include('connexionDB.php');
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>année - académique</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
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
        <div class="container-xxl flex-grow-1 container-p-y">
            <h3> Listes des années académiques</h3>
            <a href="examen/add_annee.php"><button type="button" class="btn rounded-pill btn-primary">Ajouter</button></a>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                    </tr>
                    <?php 
                    $numero = 0;
                    $annees=$connexion->query("SELECT * FROM annee_academique");
                        while($element=$annees->fetch()){
                            $numero +=1;
                    ?>
                </thead>
                <tbody>
                        <td><?php echo $numero ?></td>
                        <td><?php echo $element['code'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>