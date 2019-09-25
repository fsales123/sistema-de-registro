<?php 
include "ClassFunctions.php"; 
session_start();


$empresa = $_REQUEST['empresa'];
$registro = $_REQUEST['registro'];
$codigo = $_REQUEST['codigo'];

if(!empty($empresa) && !empty($registro) && !empty($codigo)){
    
    $conex = new conexao();
    $conex->addUsuario($empresa, $registro, $codigo);
    $user_name = $conex->listUser(['id', $_SESSION['user']]); 

    //criar log
    date_default_timezone_set('America/Sao_Paulo'); 
    $fp = fopen("logs/logInsert.log", "a+");
    $msg = $user_name['usuario'].", inseriu a empresa: ".$empresa ." ". date('d/m/Y H:i:s')."\r\n";
    fwrite($fp, $msg);
    fclose($fp);

    header('Location: home.php');
}else{
    
    $msg = "Erro ao cadastrar clinete";
    echo "<script>alert('$msg');window.location.assign('index.php');</script>";
}


