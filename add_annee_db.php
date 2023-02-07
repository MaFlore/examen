<?php
include('connexionDB.php');

if (isset($_POST['ajouter'])){

    $code = $_POST['code'];

    $annee=$connexion->prepare('INSERT INTO annee_academique(code) VALUES(:code)');
    if($annee->execute(array(
        'code'=>$code
        ))){
    header('Location: /examen/annees_academiques.php');
    }
}
?>