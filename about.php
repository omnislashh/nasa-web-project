<?php
session_start();
include 'menu.php';
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembres', 'root', '');
var_dump($bdd);
echo "connected/";
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
    <p>To connect use your id in url</p>
    <p>To edit use your id in url http://localhost/nasa-web-project/editionprofil.php?id= and you will be directly redirected to the connexion page</p>

</body>
</html>