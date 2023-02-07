<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ajout d'une filière</title>
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
    <h2>Ajout d'une filière</h2>
    <a href="examen/filiere.php"><button type="button" class="btn rounded-pill btn-success">Retour</button></a>
    <form class="form-horizontal" method="post" action="examen/add_filiere_db.php">
        <div class=" form-group ">
            <label class="control-label col-sm-2 " for="code">Code :</label>
            <div class="col-sm-10 ">
                <input type="text" class="form-control " id="code" name="code" placeholder="Code" required>
            </div>
        </div>
        <div class="form-group ">
            <label class="control-label col-sm-2 " for="libelle">Libelle :</label>
            <div class="col-sm-10 ">
                <input type="text" class="form-control " id="libelle" name="libelle" placeholder="Libelle" required>
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