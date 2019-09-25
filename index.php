<?php
include "head.php";
?>
<div class="container">
<form action="login.php" method="post">
  <div class="imgcontainer">
    <img src="assets/images/logo.png" alt="logo" class="logo"><br>
    <span>Service Quality<br>
        <h5>Registro de Cadastro</h5>
    </span>
  </div>

  <div class="container">
    <label for="user"><b>User</b></label>
    <input type="text" placeholder="User" class="form-control" name="user" required><br>

    <label for="senha"><b>Senha</b></label>
    <input type="password" placeholder="Senha" class="form-control" name="senha" required>

    <button class="btn btn-primary">Login</button>
  </div>
</form>
</div>