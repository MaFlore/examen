<?php 
include('connexionDB.php');
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>étudiants</title>
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
            <h3>Listes des étudiants</h3>
            <a href="examen/add_etudiant.php"><button type="button" class="btn rounded-pill btn-primary">Ajouter</button></a>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Date naissance</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                    $numero = 0;
                    $etudiants=$connexion->query("SELECT * FROM etudiant");
                        while($element=$etudiants->fetch()){
                            $numero +=1;
                    ?>
                </thead>
                <tbody>
                        <td><?php echo $numero ?></td>
                        <td><?php echo $element['nom'] ?></td>
                        <td><?php echo $element['prenom'] ?></td>
                        <td><?php echo $element['email'] ?></td>
                        <td><?php echo $element['date_naissance'] ?></td>
                        <td>
                            <a href="examen/update_etudiant.php?id=<?=$element['id']?>"><button type="button" class="btn rounded-pill btn-warning">Modifier</button></a>
                            <a href="examen/delete_etudiant_db.php?id=<?=$element['id']?>"><button type="button" class="btn rounded-pill btn-danger">Supprimer</button></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>