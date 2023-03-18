<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if(!isset($_GET['id'])){
            $res = "Erro.<br>Nenhum usuário selecionado.";
        }else{
            include_once("funcs.php");
            $dados = listar($_GET['id']);
            $id = $dados[0][0];
            $nome = $_POST['usuario'];
            $email = $_POST['email'];
            $numero = $_POST['numero'];
        if(!isset($_POST['email'])){
            $res = "";
        }elseif(modificar($id,$nome, $email, $numero)){
            $res = "Usuário modificado com sucesso.";
        }else{
            $res = "Erro ao editar usuário.";
        }
    ?>
    <form action="" method="post">
        <label for="usuario">Nome de usuário:</label><br>
        <input type="text" name="usuario" id="" min="1" required value=<?=$nome?>><br><br>
        <label for="email">E-mail:</label><br>
        <input type="text" name="email" id="" min="1" required value=<?=$email?>><br><br>
        <label for="numero">Número de telefone:</label><br>
        <input type="number" name="numero" id="" min="10" required value=<?=$numero?>><br><br>
        <input type="submit" value="Editar">
    </form>
    <?php } ?>
    <h2><?=$res?></h2>
    <a href="index.php">Voltar</a>
</body>
</html>