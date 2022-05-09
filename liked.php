<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembres', 'root', '');
print_r($_SESSION['id']);
if(!empty($_POST)) {
    $dataId = json_encode($_POST);
    $obj = json_decode($dataId);

    foreach($obj as $key => $value) {
        echo $key;
        $insertpic = $bdd->prepare("INSERT INTO nasapic(idLikedNasaPic, likedBy) VALUE(?, ?)");        
        $insertpic->execute(array($key, $_SESSION['id']));
        //modifier table nasapic : ajout id membre
        //faire innerjoin pour display
        //downside : redondance
    }
}