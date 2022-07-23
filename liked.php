<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembres', 'root', '');
echo "clicked & ";

// echo $_SESSION['nasaPicNumber'];

echo "liked by user id : ";
print_r($_SESSION['id']);
// $dataId = json_encode($_POST);
// echo $daataId;
// $obj = json_decode($dataId);
// echo $obj;
// echo $obj;
// echo $_POST;
// echo $dataId;
//    foreach($obj as $key => $value) {
//     echo $key;
//          echo $value;
//          $insertid = $bdd->prepare("INSERT INTO nasapic(idNasaPic, nasaPicNumber) VALUES(?, ?)");        
//          $insertid->execute(array($key, $_SESSION['id']));
// }
?>



