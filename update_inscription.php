<?php
    include_once("connexionDB.php");
    session_start();
    
    try{
        $id=$_GET['id'];

        $inscription = $connexion->prepare('SELECT *  FROM inscription WHERE id=:id');
        $inscription->execute([':id'=> $id]);
        $reponse = $inscription->fetch(PDO::FETCH_OBJ);

        $liste_etudiants = $connexion->query("SELECT * FROM etudiant ");
        $liste_filieres = $connexion->query("SELECT * FROM filiere ");
        $liste_annees = $connexion->query("SELECT * FROM annee_academique ");
    }
    catch(Exception $e){
        print_r($e);
    }

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Modification d'une inscription</title>
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
            <a href="">
                <button type="button" class="btn rounded-pill btn-info">Deconnectez-vous !</button>
            </a>
        </div>
    <h2>Modification d'une inscription</h2>
    <a href="examen/inscriptions.php"><button type="button" class="btn rounded-pill btn-success">Retour</button></a>
    <form class="form-horizontal" method="post" action="examen/update_inscription_db.php">
        <input class="form-control" type="hidden" id="id" name="id" value="<?= $reponse->id?>">
        <div class=" form-group ">
            <label class="control-label col-sm-2 " for="etudiant_id">Etudiant :</label>
            <div class="col-sm-8 form-group ">
                <select class="form-control" name="etudiant_id" value="<?= $reponse->etudiant_id?>">
                    <?php
                        foreach( $liste_etudiants as $etudiant ) {
                    ?>
                        <option value="<?php echo $etudiant['id']; ?>"><?php echo $etudiant['nom'].' '.$etudiant['prenom']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group ">
            <label class="control-label col-sm-2 " for="filiere_id">Filiere :</label>
            <div class="col-sm-8 form-group ">
                <select class="form-control" name="filiere_id" value="<?= $reponse->filiere_id?>">
                    <?php
                        foreach( $liste_filieres as $filiere ) {
                    ?>
                        <option value="<?php echo $filiere['id']; ?>"><?php echo $filiere['libelle']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group ">
            <label class="control-label col-sm-2 " for="annee_id">Année académique :</label>
            <div class="col-sm-8 form-group ">
                <select class="form-control" name="annee_id" value="<?= $reponse->annee_id?>">
                    <?php
                        foreach( $liste_annees as $annee ) {
                    ?>
                        <option value="<?php echo $annee['id']; ?>"><?php echo $annee['code']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group button">
            <div class="col-sm-offset-2 col-sm-10 ">
                <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
            </div>
        </div>
    </form>
    </div>
</body>

</html>