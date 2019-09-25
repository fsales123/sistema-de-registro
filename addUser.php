<?php
include "Classfunctions.php";

$permissao = $_POST['permissao'];

$user = $_POST['user'];
//$senha = $_POST['senha'];

$senha = password_hash($_POST['senha'], PASSWORD_BCRYPT); 


if(!empty($user) && !empty($senha) && !empty($permissao)){
$conex = new conexao();
$conex->User($user, $senha, $permissao);

header('Location:admin.php'); 

}else{
    echo "erro ao registrar";
}

