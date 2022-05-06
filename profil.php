<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembres', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Profil de <?php echo $userinfo['pseudo'];?></h2>
    <h3>Pseudo = <?php echo $userinfo['pseudo']?></h3>
    <h3>Mail = <?php echo $userinfo['email']?></h3>
    <?php
    if(isset($erreur)) {
        echo $erreur;
    }
    ?>
</body>
</html>