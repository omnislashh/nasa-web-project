<?php
session_start();


$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembres', 'root', '');
echo "log: connected to database";
include 'menu.php';
// var_dump($bdd);

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
<div>
        
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
    <p class="list-style">The intent of this site is about:</p>
    <ul class="list-style">
        <li>- connecting to a database</li>
        <li>- fetching some datas from a given endpoint</li>
        <li>- giving a user the possibiity of creating a profile via a form</li>
        <li>- using a learning subject to push my learning skills</li>
    </ul>
    <p class="p-style">To create your profile use </p>
    <p class="code">http://localhost/nasa-web-project/inscription.php </p>
    <p class="p-style">and a user id will be given to you, please note it carefully whereas your index would remain undefined by php</p>
    <p class="code">To connect use your id in url with http://localhost/nasa-web-project/profil.php?id=</p>
    <p class="p-style">To edit your profile use your id in url</p> 
    <p class="code">http://localhost/nasa-web-project/editionprofil.php?id=</p> 
    <p class="p-style">and you will be directly redirected to the connexion page</p>

    <script src="./js/script.js"></script>
</body>
</html>
<?php include 'footer.php';?>