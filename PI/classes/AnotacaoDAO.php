<?php 
    require_once 'Anotacao.php';
    require_once 'conexao.php';


class AnotacaoDAO {

    public $conexao;

    public function __construct(){
        $this->conexao = Conexao::conecta();
    }

    public function listar($cod){
        try {
            $query = $this->conexao->prepare("select * from lembrete where codProfessor = :cod order by prior desc");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");
            $query->bindValue(':cod', $cod);
            $query->execute();
            $anots = $query->fetchAll(PDO::FETCH_CLASS, "Anotacao");
            return $anots;
        } catch (PDOException $e){

            echo "Erro ". $e->getMessage();
            return False;
        }



    }

    public function cadastrar($codTurma, $descri, $prior, $codProf){
        try {
            $query = $this->conexao->prepare("insert into lembrete (codTurma, codProfessor, descri, prior) values (
                :cd,
                :cp,
                :d,
                :p
            ) ");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");
            $query->bindValue(':cd', $codTurma);
            $query->bindValue(':cp', $codProf);
            $query->bindValue(':d', $descri);
            $query->bindValue(':p', $prior);
            $query->execute();
            
            return True;
        } catch (PDOException $e){

            echo "Erro ". $e->getMessage();
            return False;
        }



    }

    public function deletar($cod){
        try {
            $query = $this->conexao->prepare("delete from lembrete where codigo = :cod");
    
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");
            $query->bindValue(':cod', $cod);
   
            $query->execute();
            
            return True;
        } catch (PDOException $e){

            echo "Erro ". $e->getMessage();
            return False;
        }



    }
}