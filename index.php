<?php
session_start();
if(isset($_SESSION['comptecree'])) {
    // echo $_SESSION['comptecree'];
}
include 'menu.php';
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembres', 'root', '');
var_dump($bdd);
var_dump($_SESSION['id']);
echo "connected to database";

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
    <h1>Welcome</h1>
    
    <ul class="pics">

    </ul>
    <div>I'm the footer</div>
    <script src="./js/nasa.js"></script>
    <script src="./js/fullScreen.js"></script>
</body>
</html>
<?php
    include 'footer.php';?>
