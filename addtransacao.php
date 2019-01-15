<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adicionar Transação</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h3>Adicionar Transação:</h3>

    <form method="POST">
        <div class="form-group">
            <label for="">Tipo de Transação:</label>
            <select name="tipo" class="form-control">
                <option value="0">Depósito</option>
                <option value="1">Retirada</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Valor:</label>
            <input type="text" class="form-control" id="" name="valor" pattern="[0-9,.]{1,}" placeholder="Insira o valor da transação">
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">+Adicionar Transação</button>
    
    </form>
</div> 
</body>
</html>