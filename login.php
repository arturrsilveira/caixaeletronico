<?php 
session_start();
require 'config.php';

if (isset($_POST['agencia']) && empty($_POST['agencia']) == false ) {
    $agencia = addslashes($_POST['agencia']);
    $conta   = addslashes($_POST['conta']);
    $senha   = addslashes($_POST['password']);

    $sql = $pdo->prepare("SELECT * FROM contas WHERE agencia = :agencia AND conta = :conta AND senha = :senha");
    $sql->bindValue(":agencia", $agencia);
    $sql->bindValue(":conta", $conta);
    $sql->bindValue(":senha", md5($senha));
    $sql->execute();

    if ($sql->rowCount() > 0){
        $sql = $sql->fetch();

        $_SESSION['banco'] = $sql['id'];
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Banco da Fortuna - Seu banco online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <h3>Efetue Login:</h3>

    <form method="POST">
        <div class="form-group">
            <label for="">Agência:</label>
            <input type="text" class="form-control" id="" aria-describedby="Agencia" name="agencia" placeholder="Insira o número da sua agência">
        </div>
        <div class="form-group">
            <label for="">Conta:</label>
            <input type="text" class="form-control" id="" aria-describedby="Conta" name="conta" placeholder="Insira o número da sua conta">
        </div>
        <div class="form-group">
            <label for="">Senha:</label>
            <input type="password" class="form-control" id="" name="password" placeholder="Insira sua senha">
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Efetuar Login</button>
    
    </form>
</div> 


</body>
</html>