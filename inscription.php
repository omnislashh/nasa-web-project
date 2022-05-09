<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembres', 'root', '');
var_dump($bdd);
echo "connected/";
if(isset($_POST['formulaire-inscription'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $confirmationMail = htmlspecialchars($_POST['confirmation-mail']);
    $password = sha1($_POST['password']);
    $confirmationPassword = sha1($_POST['confirmation-password']);

    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['confirmation-mail']) AND !empty($_POST['password']) AND !empty($_POST['confirmation-password'])) {
        echo "input sanitized/";
        
        $pseudoLength = strlen($pseudo);
        if($pseudoLength <= 255) {
            if($mail == $confirmationMail) {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $reqpseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
                    $reqpseudo->execute(array($pseudo));
                    $pseudoexist = $reqpseudo->rowCount();
                    if($pseudoexist == 0) {
                        $reqmail = $bdd->prepare("SELECT * FROM membres WHERE email = ?");
                        $reqmail->execute(array($mail));
                        $mailexist = $reqmail->rowCount();
                        if($mailexist == 0) {
                            if($password == $confirmationPassword) {
                                $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, email, motdepasse) VALUES(?, ?, ?)");
                                $insertmbr->execute(array($pseudo, $mail, $password));
                                $_SESSION['comptecree'] = "inscription réussie";
                                $myId = $bdd->prepare("SELECT id FROM membres WHERE pseudo = ?");
                                $myId->execute(array($pseudo));
                                $userinfo = $myId->fetch();
                                $_SESSION['id'] = $userinfo['id'];
                                header("Location: index.php?id=".$_SESSION['id']);
                            } else {
                                $erreur = "Les mots de passe ne correspondent pas.";
                            }
                        } else {
                            $erreur = "Cet email est déjà utilisé";
                        }
                    } else {
                        $erreur = "Ce pseudo est déjà utilisé";
                    }
                } else {
                    $erreur = "Votre email n'est pas au bon format";
                }
            } else {
                $erreur = "Les emails ne correspondent pas.";
            }
        } else {
            $erreur = "Votre pseudo doit être inférieur ou égal à 255 caractères.";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés";
    }   
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
    <h1>Inscription</h1>
    <form method="POST" action="">
        <table>
            <tr>
                <td>
                    <label for="pseudo">Votre pseudo :</label>
                </td>
                <td>
                    <input type="text" placeholder="votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; }?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="mail">Votre mail :</label>
                </td>
                <td>
                    <input type="email" placeholder="votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; }?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="confirmation-mail">Votre confirmation de mail :</label>
                </td>
                <td>
                    <input type="email" placeholder="votre confirmation de mail" id="confirmation-mail" name="confirmation-mail" value="<?php if(isset($confirmationMail)) { echo $confirmationMail; }?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Votre password :</label>
                </td>
                <td>
                    <input type="password" placeholder="votre password" id="password" name="password" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="confirmation-password">Votre confirmation de password :</label>
                </td>
                <td>
                    <input type="password" placeholder="votre confirmation de password" id="confirmation-password" name="confirmation-password" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="formulaire-inscription" value="Je m'inscris">
                </td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($erreur)) {
        echo $erreur;
    }
    ?>
</body>
</html>