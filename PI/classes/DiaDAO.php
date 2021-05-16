<?php 
    require_once 'Dia.php';
    require_once 'conexao.php';


class DiaDAO {

    public $conexao;

    public function __construct(){
        $this->conexao = Conexao::conecta();
    }

    public function listar(){
        try {
            $query = $this->conexao->prepare("select * from dia order by codigo asc");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");

            $query->execute();
            $dias = $query->fetchAll(PDO::FETCH_CLASS, "Dia");
            return $dias;
        } catch (PDOException $e){

            echo "Erro no login ". $e->getMessage();
            return False;
        }



    }
}