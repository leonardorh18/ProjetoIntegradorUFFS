<?php 
    require_once 'Aluno.php';
    require_once 'conexao.php';


class AlunoDAO {

    public $conexao;

    public function __construct(){
        $this->conexao = Conexao::conecta();
    }

    public function cadastrar($matricula, $email, $nome, $telefone){
        try {
            $query = $this->conexao->prepare("insert into aluno (matricula, nome_completo, email, telefone, status_mat) values (:m, :nc, :e, :t, :sm)");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");
            $query->bindValue(":m", $matricula);
            $query->bindValue(":nc", $nome);
            $query->bindValue(":e", $email);
            $query->bindValue(":t", $telefone);
            $query->bindValue(":sm", True);
            $query->execute();
            return True;

        } catch (PDOException $e){

            echo "Erro no login ". $e->getMessage();
            return False;
        }



    }

    public function listar(){
        try {
            $query = $this->conexao->prepare("select * from aluno order by nome_completo asc");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");

            $query->execute();
            $alunos = $query->fetchAll(PDO::FETCH_CLASS, "Aluno");
            return $alunos;
        } catch (PDOException $e){

            echo "Erro no login ". $e->getMessage();
            return False;
        }



    }

    public function listarName($nome){
        try {
            $query = $this->conexao->prepare("select * from aluno where nome_completo = :n order by nome_completo asc");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");
            $query->bindValue(":n", $nome);
            $query->execute();
            $alunos = $query->fetchAll(PDO::FETCH_CLASS, "Aluno");
            return $alunos;
        } catch (PDOException $e){

            echo "Erro no login ". $e->getMessage();
            return False;
        }



    }

    public function edit($matriculaAtual, $matricula, $email, $nome, $telefone){
        try {
            
            $query = $this->conexao->prepare("update aluno set nome_completo = :n, 
            email = :e, telefone = :t, matricula = :mn where matricula = :ma");
          
            $query->bindValue(":n", $nome);
            $query->bindValue(":e", $email);
            $query->bindValue(":t", $telefone);
            $query->bindValue(":mn", $matricula);
            $query->bindValue(":ma", $matriculaAtual);

            $query->execute();
            return True;
        } catch (PDOException $e){

            echo "Erro no login ". $e->getMessage();
            return False;
        }



    }

    public function selectByMat($matricula){
        try {
            $query = $this->conexao->prepare("select * from aluno where matricula = :mat");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");
            $query->bindValue(":mat", $matricula);
            $query->execute();
            $alunos = $query->fetchAll(PDO::FETCH_CLASS, "Aluno");
            return $alunos;
        } catch (PDOException $e){

            echo "Erro no login ". $e->getMessage();
            return False;
        }



    }


    public function delete($mat){
        try {
            $query = $this->conexao->prepare("delete from aluno where matricula = :mat");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");
            $query->bindValue(":mat", $mat);
            return $query->execute();


        } catch (PDOException $e){

            echo "Erro ao deletar ". $e->getMessage();
            return False;
        }



    }

}


?>
