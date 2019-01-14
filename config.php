<?php 
try{

    $pdo = new PDO("mysql:dbname=caixaeletronico;host=localhost", "root", "");

} catch(PDOException $e){
    echo "Erro:" .$e->getMessage();
    exit;

};
?>