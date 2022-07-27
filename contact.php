<?php
session_start();

include 'menu.php';
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembres', 'root', '');
echo "log: connected to database";
// echo "PDO";
if(isset($_POST['formconnect'])) {
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $passwordconnect = sha1($_POST['passwordconnect']);
    if(!empty($mailconnect) AND !empty($passwordconnect)) {
        $requser = $bdd->prepare("SELECT * FROM membres WHERE email = ? AND motdepasse = ?");
        $requser->execute(array($mailconnect, $passwordconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['email'];
            header("Location: profil.php?id=".$_SESSION['id']);
        } else {
            $erreur = "Mauvais mail ou mot de passe";
        }
    } else {
        $erreur = "Tous les champs doivent être connectés";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <h1>Contact</h1>
    <p class="p-style">This is a site made for educational purposes, you can contact me by email: 
    <a class="f-link" href="mailto:elie.ly.kok@gmail.com">Elie Ly-Kok</a>  
    
    <p class="p-style">or by phone: 06 65 67 30 62</p>
    
    <!-- <form method="POST" action="">
        <input type="mail" name="mailconnect" placeholder="Mail" />
        <input type="password" name="passwordconnect" placeholder="Mot de passe" />
        <input class="btn-color"  type="submit" name="formconnect" value="Se connecter" />
    </form> -->
    <?php
    if(isset($erreur)) {
        echo $erreur;
    }
    ?>
    <script src="./js/script.js"></script>
</body>
</html>
<?php include 'footer.php';?>