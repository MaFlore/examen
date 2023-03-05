<?php 
include('connexionDB.php');
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>inscriptions</title>
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
        <div class="container-xxl flex-grow-1 container-p-y">
            <h3> Listes des inscriptions</h3>
            <a href="examen/add_inscription.php"><button type="button" class="btn rounded-pill btn-primary">Ajouter</button></a>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Etudiant</th>
                        <th>Filière</th>
                        <th>Année académique</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                    $numero = 0;
                    $inscriptions=$connexion->query("SELECT * FROM inscription");
                        while($element=$inscriptions->fetch()){
                            $numero +=1;
                    ?>
                </thead>
                <tbody>
                        <td><?php echo $numero ?></td>
                        <td>
                            <?php 
                                $id_etudiant = $element['etudiant_id'];
                                        
                                $etudiant = $connexion->prepare('SELECT *  FROM etudiant WHERE id=:id');
                                $etudiant->execute([':id'=> $id_etudiant]);
                                $reponse = $etudiant->fetch(PDO::FETCH_OBJ);
                                echo $reponse->nom.' '.$reponse->prenom;
                            ?>
                        </td>
                        <td>
                            <?php 
                                $id_filiere = $element['filiere_id'];
                                        
                                $filiere = $connexion->prepare('SELECT *  FROM filiere WHERE id=:id');
                                $filiere->execute([':id'=> $id_filiere]);
                                $reponse = $filiere->fetch(PDO::FETCH_OBJ);
                                echo $reponse->libelle;
                            ?>
                        </td>
                        <td>
                            <?php 
                                $id_annee = $element['annee_id'];
                                        
                                $annee = $connexion->prepare('SELECT *  FROM annee_academique WHERE id=:id');
                                $annee->execute([':id'=> $id_annee]);
                                $reponse = $annee->fetch(PDO::FETCH_OBJ);
                                echo $reponse->code;
                            ?>
                        </td>
                        <td>
                            <a href="examen/update_inscription.php?id=<?=$element['id']?>"><button type="button" class="btn rounded-pill btn-warning">Modifier</button></a>
                            <a href="examen/delete_inscription_db.php?id=<?=$element['id']?>"><button type="button" class="btn rounded-pill btn-danger">Supprimer</button></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>