<?php 
    function conectar(){
        return mysqli_connect('localhost','root','','user_banco');
    }
    function verificar_banco(){
        try{
            $con = conectar();
            mysqli_query($con,"select * from user_tabela");
            return true;
        } catch(Exception $ex){
            criar_banco();
            return false;
        }
    }
    function criar_banco(){
        try{
            $con = mysqli_connect("localhost","root","");
            mysqli_query($con,"create database user_banco");
        }catch(Exception $err){
            echo"";
        }
        try{
            $con = conectar();
            mysqli_query($con,"CREATE TABLE `user_banco`.`user_tabela` (`id` INT NOT NULL AUTO_INCREMENT , `usuario` TEXT NOT NULL , `email` TEXT NOT NULL , `numero` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
        }catch(Exception $err){
            echo"";
        }
    }

    function listar($id=false){
        $con = conectar();
        if(!$id){
            $res = mysqli_query($con,"select * from user_tabela");
        }else{
            try{
                $res = mysqli_query($con,"select * from user_tabela where id = $id");
            }catch(Exception $err){
                echo $err;
                return false;
            }          
        }       
        $itens = mysqli_fetch_all($res);
        return $itens;
    }
    function inserir($us, $em, $num){
        $con = conectar();
        $sql = "insert into user_tabela (usuario, email, numero) VALUES ('$us', '$em', '$num')";
        mysqli_query($con, $sql);
    }

    function modificar($editar, $nome, $email, $num){
        $editar = intval($editar);
        $con = conectar();
        $sql = "UPDATE user_tabela SET usuario = '$nome', email = '$email', numero = '$num' where id = $editar";
        try{
            $res = mysqli_query($con,$sql);
            return true;
        }catch(Exception $err){
            return false;
        }
    }

    function deletar($id){
        $con = conectar();
        $sql = "DELETE from user_tabela WHERE id = $id";
        $res = mysqli_query($con,$sql);
        if(mysqli_affected_rows($con)>0){
            return array(false,"Usuário deletado com sucesso.");
        }else{
            return array(true,"Erro a deletar usuário.<br> Usuário inexistente.");
        }
    }
?>