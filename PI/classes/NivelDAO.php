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

            echo "Erro no login ". $e->getMessage();
            return False;
        }
    }



}

?>