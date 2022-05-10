<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembres', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

    $reqLiked = $bdd->prepare('SELECT * FROM nasapic WHERE ? = likedBy');
    $reqLiked->execute(array($getid));
    $userInfoLiked = $reqLiked->fetchAll();
    var_dump($userInfoLiked);
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
    <h2>Page Profil de <?php echo $userinfo['pseudo'];?></h2>
    <h3>Pseudo = <?php echo $userinfo['pseudo']?></h3>
    <h3>Mail = <?php echo $userinfo['email']?></h3>
    <?php
    if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
        echo "mon profil perso";
    ?>
        <a href="editionprofil.php">Editer mon profil</a>
        <a href="deconnexion.php">Se déconnecter</a>
    <?php
    }
    ?>    
    <?php
    if(isset($erreur)) {
        echo $erreur;
    }
    ?>
    <?php
    
    ?>
</body>
</html>