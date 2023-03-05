<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Authentification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h4>Bienvenue sur notre plateforme de gestion des inscriptions des etudiants !</h4>
    <h3>Authentification</h3>
    <form class="form-horizontal" method="post" action="login_db.php">
        <div class=" form-group ">
            <label class="control-label col-sm-2 " for="username">Username :</label>
            <div class="col-sm-10 ">
                <input type="text" class="form-control " id="username" name="username" placeholder="username" required>
            </div>
        </div>
        <div class="form-group ">
            <label class="control-label col-sm-2 " for="password">Password :</label>
            <div class="col-sm-10 ">
                <input type="password" class="form-control " id="password" name="password" placeholder="password" required>
            </div>
        </div>
        <div class="form-group button">
            <div class="col-sm-offset-2 col-sm-10 ">
                <button type="submit" name="authentifier" class="btn btn-primary">S'authentifier</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>