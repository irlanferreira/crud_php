<?php
    if(!isset($_GET['id'])){
        $res = "ERRO. Não foi selecionado nenhum usuário para excluir.";
    }else{
        include_once("funcs.php");
        $res = deletar($_GET['id'])[1];
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
    <h2><?=$res?></h2>
    <a href="index.php">Voltar</a>
</body>
</html>