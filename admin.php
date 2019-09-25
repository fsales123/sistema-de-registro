<?php
session_start();
include "head.php"; 

if(!empty($_SESSION['admin'])){
    
}else{
    echo "Erro ao conectar no admin";
    die;
}
?>

<body>
<div class="container">
    <h5>Bem vindo Administrador <a class="btn-ft" href='logout.php'>[ Sair ]</a></h5> 
<hr>

<form action="addUser.php" method="POST">
    Usuário: <input type="text" name="user" class="form-control" placeholder="Usuario">
    Senha: <input type="password" name="senha" class="form-control" placeholder="******">
    Permissão: <select name="permissao" class="form-control">
        <option selected>Selecione</option>
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>
    <button class="btn btn-primary btn-ft">Cadastrar</button>
</form>
</div>
</body>
</html>