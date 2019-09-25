<?php 
include "ClassFunctions.php";
session_start();


$id = isset($_POST['id']) ? $_POST['id'] : null;
$empresa = isset($_POST['empresa']) ?  $_POST['empresa'] : null;
$registro = isset($_POST['registro']) ? $_POST['registro'] : null;
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : nul;

if(!empty($empresa) && !empty($registro) && !empty($codigo)){
    $conex = new conexao();

    $conex->updateList($id, $empresa, $registro, $codigo);
    $user_name = $conex->listUser(['id', $_SESSION['user']]);

    //criar log
    date_default_timezone_set('America/Sao_Paulo');
    $fp = fopen("logs/logUpdate.log", "a+");
    $msg = $user_name['usuario'].", atualizou a empresa: ".$empresa ." ". date('d/m/Y H:i:s')."\r\n";
    fwrite($fp, $msg);
    fclose($fp);
    header('Location: home.php');
}else{
    
    $msg = "Erro ao atualizar cliente";
    echo "<script>alert('$msg');window.location.assign('home.php');</script>";
}