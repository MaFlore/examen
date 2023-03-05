<?php 
include('connexionDB.php');
session_start();
$id=$_GET['id'];

$etudiant = $connexion->prepare('SELECT *  FROM etudiant WHERE id=:id');
$etudiant->execute([':id'=> $id]);
$reponse = $etudiant->fetch(PDO::FETCH_OBJ);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Modification d'un étudiant</title>
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
    <h2>Modification d'un étudiant</h2>
    <a href="examen/etudiants.php"><button type="button" class="btn rounded-pill btn-success">Retour</button></a>
    <form class="form-horizontal" method="post" action="examen/update_etudiant_db.php">
        <input type="hidden"  id="id" name="id" required value="<?= $reponse->id?>"/>
        <div class=" form-group ">
            <label class="control-label col-sm-2 " for="nom">Nom :</label>
            <div class="col-sm-10 ">
                <input type="text" class="form-control " id="nom" name="nom" placeholder="Nom" value="<?= $reponse->nom?>" required>
            </div>
        </div>
        <div class="form-group ">
            <label class="control-label col-sm-2 " for="prenom">Prenom :</label>
            <div class="col-sm-10 ">
                <input type="text" class="form-control " id="prenom" name="prenom" placeholder="Prenom" value="<?= $reponse->prenom?>" required>
            </div>
        </div>
        <div class="form-group ">
            <label class="control-label col-sm-2 " for="email">Email :</label>
            <div class="col-sm-10 ">
                <input type="email" class="form-control " id="email" name="email" placeholder="Email" value="<?= $reponse->email?>" required>
            </div>
        </div>
        <div class="form-group ">
            <label class="control-label col-sm-2 " for="date_naissance">Date Naissance :</label>
            <div class="col-sm-10 ">
                <input type="date" class="form-control " id="date_naissance" name="date_naissance" value="<?= $reponse->date_naissance?>" required>
            </div>
        </div>
        <div class="form-group button">
            <div class="col-sm-offset-2 col-sm-10 ">
                <button type="submit" name="modifier" class="btn btn-warning">Modifier</button>
            </div>
        </div>
    </form>
    </div>
</body>

</html>