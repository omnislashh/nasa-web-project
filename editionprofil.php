<?php
session_start();
include 'menu.php';
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembres', 'root', '');
echo "log: connected to database";
if(isset($_SESSION['id']))
{
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id=?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    
    if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
        $reqpseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
        $reqpseudo->execute(array($pseudo));
        $pseudoexist = $reqpseudo->rowCount();
        if($pseudoexist == 0) {
            $newpseudo = htmlspecialchars($_POST['newpseudo']);
            $newPseudoLength = strlen($newpseudo);
            if($newPseudoLength <= 255) {
                $insertpseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
                $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
                header('Location: profil.php?id='.$_SESSION['id']);
            }
        } else {
            $erreur = "Ce pseudo est déjà utilisé";
        }
    }

    //gestion images liked
    if($_SESSION['id']){

    }
    
        
    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['email']) {
        $newmail = htmlspecialchars($_POST['newmail']);
        $reqmail = $bdd->prepare("SELECT * FROM membres WHERE email = ?");
        $reqmail->execute(array($newmail));
        $mailexist = $reqmail->rowCount();
        if($mailexist == 0) {
            
            if(filter_var($newmail, FILTER_VALIDATE_EMAIL)) {
                $insertmail = $bdd->prepare("UPDATE membres SET email = ? WHERE id = ?");
                $insertmail->execute(array($newmail, $_SESSION['id']));
                header('Location: profil.php?id='.$_SESSION['id']);
            } else {
                $msg = "Votre email n'est pas au bon format";
            }
        } else {
            $msg = "Cet email est déjà utilisé";
        }
    }         
    
    if(isset($_POST['newpassword']) AND !empty($_POST['newpassword']) AND $_POST['newpassword'] AND !empty($_POST['newpassword2']) AND $_POST['newpassword2']) {
        $newpassword = sha1($_POST['newpassword']);
        $newpassword2 = sha1($_POST['newpassword2']);
        if($newpassword == $newpassword2) {
            $insertpassword = $bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
            $insertpassword->execute(array($newpassword, $_SESSION['id']));
            header('Location: profil.php?id='.$_SESSION['id']);
        } else {
            $msg = "Vos deux mots de passe ne correspondent pas.";
        }
    }

    if(isset($_POST['newpseudo']) AND $_POST['newpseudo'] == $user['pseudo']) {
        header('Location: profil.php?id='.$_SESSION['id']);
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
    <h2>Edition de mon profil</h2>
    <p>To edit use your id in url http://localhost/nasa-web-project/editionprofil.php?id=</p>
    <form method="POST" action="">
        <table>
            <tr>
                <td>
                    <label>Pseudo :</label>
                </td>
                <td>
                    <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Email :</label>
                </td>
                <td>
                    <input type="mail" name="newmail" placeholder="Mail" value="<?php echo $user['email']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Password :</label>
                </td>
                <td>
                    <input type="password" name="newpassword" placeholder="Password"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Confirmation Password :</label>
                </td>
                <td>
                    <input type="password" name="newpassword2" placeholder="Confirm Password"/>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="btn-color" type="submit" value="Mettre à jour mon profil"/>
                </td>
            </tr>
        </table>    
    </form>
    <?php if(isset($msg)) { echo $msg; } ?>
    <script src="./js/script.js"></script>
</body>
</html>
<?php
} else {
    header('Location: connexion.php');
}
?>
<?php include 'footer.php';?>