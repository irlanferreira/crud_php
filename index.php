<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="styles/index.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Básico</title>
    <?php 
        include_once('funcs.php');
        verificar_banco();
        $itens = listar();
    ?>
</head>
<body>
    <header>
        <h1>Crud Básico</h1>
    </header>
    <main>
        <div id="tabela">
            <table>
                <thead>
                    <th>Usuário</th>
                    <th>E-mail</th>
                    <th>Número</th>
                </thead>
                <tbody>
                    <?php 
                        foreach($itens as $item){
                    ?>
                    <tr>
                        <td><?=$item[1]?></td>
                        <td><?=$item[2]?></td>
                        <td><?=$item[3]?></td>
                        <td><a href=<?="excluir.php?id=$item[0]"?>>Excluir</a></td>
                        <td><a href=<?="editar.php?id=$item[0]"?>>Editar</a></td>
                    </tr>                    
                    <?php 
                        }
                    ?>
                </tbody>
            </table>
            <a href="cadastrar.php">Adicionar</a>
        </div>    
    </main>
</body>
</html>