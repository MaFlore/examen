<?php
include('connexionDB.php');

if (isset($_POST['modifier'])){

    $id = $_POST['id'];
    $code = $_POST['code'];
    $libelle = $_POST['libelle'];

    $filiere=$connexion->prepare('UPDATE filiere SET code=:code, libelle=:libelle WHERE id=:id');
    if($filiere->execute(array(
        'code'=>$code,
        'libelle'=>$libelle,
        'id'=>$id
        ))){
    header('Location: /examen/filieres.php');
    }
}
?>