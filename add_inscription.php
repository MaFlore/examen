<?php
    include_once("connexionDB.php");
    
    try{
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
    <title>Ajout d'une inscription</title>
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
    <h2>Ajout d'une inscription</h2>
    <a href="examen/inscriptions.php"><button type="button" class="btn rounded-pill btn-success">Retour</button></a>
    <form class="form-horizontal" method="post" action="examen/add_inscription_db.php">
        <div class=" form-group ">
            <label class="control-label col-sm-2 " for="nom">Etudiant :</label>
            <div class="col-sm-8 form-group ">
                <select class="form-control" name="etudiant_id">
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
            <label class="control-label col-sm-2 " for="prenom">Filiere :</label>
            <div class="col-sm-8 form-group ">
                <select class="form-control" name="filiere_id">
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
            <label class="control-label col-sm-2 " for="email">Année académique :</label>
            <div class="col-sm-8 form-group ">
                <select class="form-control" name="annee_id">
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
                <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </form>
    </div>
</body>

</html>