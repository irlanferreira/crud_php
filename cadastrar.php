<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/index.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
</head>
<body>
    <div id="cadasrar">
        <form action="#" method="post">
            <label for="usuario">Digite seu nome de usuário:</label><br>
            <input type="text" name="usuario" id="" min="1" required><br><br>
            <label for="email">Digite seu E-mail:</label><br>
            <input type="text" name="email" id="" min="1" required><br><br>
            <label for="numero">Digite seu número de telefone:</label><br>
            <input type="number" name="numero" id="" min="10" required><br><br>
            <input type="submit" value="Cadastrar">
        </form>
    </div>
    <?php
        if(isset($_POST['usuario'])){
            $usuario = $_POST['usuario'];
            $email = $_POST['email'];
            $numero = strval($_POST['numero']);
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                if(strlen($numero)<14){
                    include_once('funcs.php');
                    inserir($_POST['usuario'], $_POST['email'], $_POST['numero']);
                    $res = "Usuario $usuario inserido com sucesso.";                    
                }else{
                    $res = "Número máximo de caracteres excedido no número.";
                }
                
            }else{
                $res = "Erro ao inserir email.";
            }     
        }
    ?>
    <?php echo isset($res)?"<h2>$res</h2>":"" ?>
    <a href="index.php">Voltar</a>
</body>
</html>