<?php

require_once 'Nivel.php';
require_once 'conexao.php';

class NivelDAO{

    public $conexao;

    public function __construct(){
        $this->conexao = Conexao::conecta();
    }

    public function listar(){

        try {
            $query = $this->conexao->prepare("select * from nivel order by descri asc");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");

            $query->execute();
            $niveis = $query->fetchAll(PDO::FETCH_CLASS, "Nivel");
            return $niveis;
        } catch (PDOException $e){

            echo "Erro". $e->getMessage();
            return False;
        }
    }

    public function cadastrar($nvl){

        try {
            $query = $this->conexao->prepare("insert into nivel (descri) values (:d)");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");
            $query->bindValue(':d', $nvl);
            $query->execute();
            return True;
        } catch (PDOException $e){

            echo "erro ". $e->getMessage();
            return False;
        }
    }

    public function delete($cod){

        try {
            $query = $this->conexao->prepare("delete from nivel where codigo = :cod");
            
            $query->bindValue(':cod', $cod);
            $query->execute();
            return True;
        } catch (PDOException $e){

            echo "Erro  ". $e->getMessage();
            return False;
        }
    }



}

?>