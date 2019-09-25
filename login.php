<?php
include "ClassFunctions.php";

$conex = new conexao();
$user = isset($_POST['user']) ? $_POST['user'] : '';
$dados = $conex->listUser(['usuario', $user]); 

$senha = isset($_POST['senha']) ? $_POST['senha'] : '';


if(password_verify($senha, $dados['senha'])){ 

    session_start();

    if($dados['permissao'] === 'user'){ 

        $_SESSION['user'] = $dados['id'];
        header('Location:home.php'); 

    }else if($dados['permissao'] === 'admin'){ 
        $_SESSION['admin'] = $dados['id'];
        header('Location: admin.php');

    }

}else{
    $msg = "Usuario ou Senha errado!";
    echo "<script>alert('$msg');window.location.assign('index.php');</script>";
    }
    

