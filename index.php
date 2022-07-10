<?php
session_start();
if(isset($_SESSION['comptecree'])) {
    // echo $_SESSION['comptecree'];
}

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembres', 'root', '');
var_dump($bdd);
var_dump($_SESSION['id']);
echo "connected/";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <h1>Index</h1>
    <ul class="pics">

    </ul>
    <script src="nasa.js"></script>
</body>
</html>