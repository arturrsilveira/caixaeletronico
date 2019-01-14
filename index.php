<?php 
    session_start();
    require 'config.php';

    if (isset($_SESSION['banco']) && empty($_SESSION) == false){

    } else {
        header("location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Projeto Caixa Eletrônico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">

<h3>BANCO DA FORTUNA!</h3>
    Banco: Nº 000<br>
    Agência: 000<br>
    <br>
    <br>

    <a href="sair.php" class="btn btn-danger">Sair</a>

</div>
    
</body>
</html>