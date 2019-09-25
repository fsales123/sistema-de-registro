<?php

class conexao {
    private $conexao;

    public function __construct(){
    try{

        $this->conexao = new PDO("mysql:dbname=cadastro;host=localhost", "root", "");

        }catch(Exception $e){
        echo "error: ". $e->getMessage();
        }
    }

    public function addUsuario($empresa, $registro, $codigo){
        $sql = "INSERT INTO registros (empresa, registro, codigo) VALUES (:empresa, :registro, :codigo)";

        try{
            $query = $this->conexao->prepare($sql);
            $param = array(':empresa' => $empresa, ':registro' => $registro, ':codigo' => $codigo);
            $query->execute($param);

        }catch(Exception $e){
            echo "error ao registrar: ". $e->getMessage();
        }
    }

    public function User($user, $senha, $permissao){
        try {
            $query = $this->conexao->prepare("INSERT INTO login (usuario, senha, permissao) VALUES (:user, :senha, :permissao)");
            $param = array(':user' => $user, ':senha' => $senha, ':permissao' => $permissao); 
            $query->execute($param);
           
        } catch (Exception $e) {
            echo "error registrar admin or user ".$e->getMessage();
        }
    }

    public function listClientes(){ 
        $sql = $this->conexao->prepare("SELECT * FROM registros");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function list($id){
        $sql = $this->conexao->prepare("SELECT * FROM registros WHERE id = :id");
        $sql->bindParam(':id', $id); 
        $sql->execute();

        $array = [];
        if($sql->rowCount() > 0){

            $array = $sql->fetch();
        }
        return $array;
    }

    public function listUser($dados = []) {
        if(is_array($dados)){
            
            $sql = $this->conexao->prepare("SELECT * FROM login WHERE $dados[0] = '$dados[1]'");
            $sql->execute();
            $array = [];
           
            if($sql->rowCount() > 0){
                $array = $sql->fetch();
            }
            
            return $array;
        }
        $sql = $this->conexao->query("SELECT * FROM login");
            $array = [];
            if($sql->rowCount() > 0){
                $array = $sql->fetch();
            }
            return $array;
    }

    public function deleteList($id){      
        try {
            $query = $this->conexao->prepare("DELETE FROM registros WHERE id = :id");
            $query->bindParam(':id', $id);
            $query->execute();
            
        } catch (Exception $e) {
            echo "erro delete ".$e->getMessage();
        }
    }
    public function updateList($id, $empresa, $registro, $codigo){
        try {
            $query = $this->conexao->prepare("UPDATE registros SET empresa = :empresa, registro = :registro, codigo = :codigo WHERE id = :id");
            $query->bindParam(':empresa', $empresa);
            $query->bindParam(':registro',$registro);
            $query->bindParam(':codigo', $codigo);
            $query->bindParam(':id', $id);
            $query->execute();
                   
        } catch (Exception $e) {
            echo "erro update".$e->getMessage();
        }
    }
    public function login($user, $senha){
        try {
            $sql = $this->conexao->prepare("SELECT * FROM login WHERE usuario = :user AND senha = :senha");
            $sql->bindParam(':user', $user);
            $sql->bindParam(':senha', $senha);
            //execute
            $sql->execute();
            
            $array = []; 
            
            if($sql->rowCount() > 0){
                
                $array = $sql->fetch(); 
            }
            return $array;

        } catch (Exception $e) {
            echo " erro: ".$e->getMessage();
        }
    }


}