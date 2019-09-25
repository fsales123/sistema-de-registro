<?php 
include "head.php";
include "ClassFunctions.php"; ?>

<div class="container">
<?php
session_start();

if(!empty($_SESSION['user'])){
  $conex = new conexao();
$ls = $conex->listUser(['id', $_SESSION['user']]);

  echo "Bem Vindo"."<span class='user-name'>".$ls['usuario']."</span>"; 
  echo "<a href='logout.php'>[ Sair ]</a>";

}else{
  echo "erro";
  die;
}

?>

 <h1 class="center">Registros</h1>
 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-ft mg10" data-toggle="modal" data-target="#cadastrarCliente">
  Adicionar Novo Cliente
</button>
<?php include "nav.php"; ?>
 <table class="table">
  <thead>
    <tr>
      <th scope="col">EMPRESA</th>
      <th scope="col">CNPJ/CPF</th>
      <th scope="col">CÓDIGO</th>
      <th scope="col">OPÇÕES</th>
    </tr>
  </thead>
  <tbody>
  <?php 
$conex = new conexao();
$list = $conex->listClientes();
if(count($list) > 0){
    foreach($list as $listar) { ?>
    <tr>
      <td><?=$listar['empresa']?></td>
      <td><?=$listar['registro']?></td>
      <td><?=$listar['codigo']?></td>
      <td>
          <a href="list-update.php?id=<?=$listar['id'];?>">Editar</a>
           |
          <a href="deletar.php?id=<?=$listar['id'];?>" onclick="return confirm('Tem certeza que deseja excluir?')";>Excluir</a>       
      </td>
    </tr>
    <?php }} ?>
  </tbody>
</table>   
</div>


<!-- Modal CADASTRAR CLIENTE -->
<div class="modal fade" id="cadastrarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="registrar.php" method="post">
                <div class="form-group">
                    <label for="empresa">Nome da Empresa</label>
                    <input type="text" name="empresa" placeholder="Empresa" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="registro">Registro</label>
                    <input type="text" id="cpfcnpj" name="registro" placeholder="Registro" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text" name="codigo" placeholder="Código" class="form-control"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary">Adicionar</button>
        </form>
      </div>      
    </div>
  </div>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script src="assets/js/script.js"></script>

