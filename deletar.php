<?php 
include "ClassFunctions.php";
session_start();


$id = isset($_GET['id']) ? $_GET['id'] : null;

if(!empty($id)){

    $conex = new conexao(); 

    $user_name = $conex->listUser(['id', $_SESSION['user']]); 
    $empresa = $conex->list($id);
    
    //criar log
    date_default_timezone_set('America/Sao_Paulo');
    $fp = fopen("logs/logDelete.log", "a+");
    $msg = $user_name['usuario'].", excluiu a empresa: ".$empresa['empresa']." ". date('d/m/Y H:i:s')."\r\n";
    fwrite($fp, $msg);
    fclose($fp);

    $conex->deleteList($id);
    header('Location: home.php');

}else{
    $msg = "Erro ao deletar cliente";
    echo "<script>alert('$msg');window.location.assign('index.php');</script>";
}
