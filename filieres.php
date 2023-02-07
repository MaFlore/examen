<?php 
include('connexionDB.php') 
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>filières</title>
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
        <div class="container-xxl flex-grow-1 container-p-y">
            <h3> Listes des filières</h3>
            <a href="examen/add_filiere.php"><button type="button" class="btn rounded-pill btn-primary">Ajouter</button></a>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Libelle</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                    $numero = 0;
                    $filieres=$connexion->query("SELECT * FROM filiere");
                        while($element=$filieres->fetch()){
                            $numero +=1;
                    ?>
                </thead>
                <tbody>
                        <td><?php echo $numero ?></td>
                        <td><?php echo $element['code'] ?></td>
                        <td><?php echo $element['libelle'] ?></td>
                        <td>
                            <a href="examen/update_filiere.php?id=<?=$element['id']?>"><button type="button" class="btn rounded-pill btn-warning">Modifier</button></a>
                            <a href="examen/delete_filiere_db.php?id=<?=$element['id']?>"><button type="button" class="btn rounded-pill btn-danger">Supprimer</button></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>