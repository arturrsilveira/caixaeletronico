<?php 
    session_start();
    require 'config.php';

    if (isset($_SESSION['banco']) && empty($_SESSION) == false){
        
        $id = $_SESSION['banco'];

        $sql = $pdo->prepare("SELECT * FROM contas WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $info = $sql->fetch();
        } else {
            header("location: login.php");
            exit;
        }

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

<h3>Bem vindo <?php echo $info['titular']; ?>!</h3>
    Conta: Nº <?php echo $info['conta']; ?><br>
    Agência: <?php echo $info['agencia']; ?><br>
    Saldo: <?php echo $info['saldo']; ?><br>
    <br><br>
    <a href="sair.php" class="btn btn-danger">Sair</a>
    <br><hr>
    <h5>Movimentação/Extrato</h5>
    <a href="addtransacao.php" class="btn btn-success"> + Adicionar Transação</a><br><br>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Data</th>
            <th>Valor</th>  
        </tr>
        </thead>
        <tbody>
        <?php
            $sql = $pdo->prepare("SELECT * FROM historico WHERE id_conta = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            if ($sql->rowCount() > 0){
                foreach($sql->fetchAll() as $item){
                ?>
                    <tr>
                        <td>
                            <?php echo date('d/m/y H:m', strtotime($item['data_operacao'])) ?>
                        </td>
                        <td>
                            <?php if($item['tipo'] == 0) : ?>
                                <font color="green">R$ <?php echo $item['valor'] ?></font>
                            <?php else : ?>
                                <font color="red">- R$ <?php echo $item['valor'] ?></font>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php
                }
            }
        ?>
        </tbody>
   
    </table>
    <br>



</div>
    
</body>
</html>