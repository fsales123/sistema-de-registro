<?php 
include "head.php";
include "ClassFunctions.php";

$id = isset($_GET['id']) ? $_GET['id'] : null;

$conex = new conexao();
$list = $conex->list($id);
?>

<div class="container">
    <h1 class="center">Alterar Cliente</h1>
    <?php include "nav.php"; ?>
<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?=$list['id'];?>">
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="empresa">Empresa</label>
      <input type="text" class="form-control" name="empresa" value="<?=$list['empresa'];?>">
    </div>
    <div class="form-group col-md-6">
      <label for="registro">Registro</label>
      <input type="text" class="form-control" name="registro" value="<?=$list['registro'];?>">
    </div>
  </div>
  <div class="form-group">
    <label for="codigo">Código</label>
    <input type="text" class="form-control" name="codigo" value="<?=$list['codigo'];?>">
  </div>
  
  <button class="btn btn-primary">Alterar</button>
  <a href="home.php" class="btn btn-default">Voltar</a>

</form>
</div>
