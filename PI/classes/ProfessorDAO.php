<?php 
    require_once 'Professor.php';
    require_once 'conexao.php';


class ProfessorDAO {

    public $conexao;

    public function __construct(){
        $this->conexao = Conexao::conecta();
    }

    public function logar($senha, $user){
        try {
            echo $senha;
            echo $user;
            $query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");
            $query->bindValue(":s", $senha);
            $query->bindValue(":u", $user);
            $query->execute();
            $prof = $query->fetchAll(PDO::FETCH_CLASS, "Professor");
            return $prof;

        } catch (PDOException $e){

            echo "Erro no login ". $e->getMessage();
        }



    }



    public function listar(){
        try {
   
            $query = $this->conexao->prepare("select * from professor where off is null or off = 0 order by nome_completo asc");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");
            $query->execute();
            $prof = $query->fetchAll(PDO::FETCH_CLASS, "Professor");
            return $prof;

        } catch (PDOException $e){

            echo "Erro no login ". $e->getMessage();
        }



    }

    public function buscarProf($cod){

        try{
            $query = $this->conexao->prepare("select * from professor where codigo = :cod");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");
            $query->bindValue(":cod", $cod);
            $query->execute();
            $prof = $query->fetchAll(PDO::FETCH_CLASS, "Professor");
            return $prof[0];


        } catch (PDOException $e){

            return False;
        }


    }

    public function cadastrar($nome, $email, $tel, $user, $senha, $perm){
        try {
   
            $query = $this->conexao->prepare("insert into professor (nome_completo, telefone, email,
            usu_acesso, senha_acesso, permissao, off) values (:n, :t, :e, :u, :s, :p, :o)");
            $query->bindValue(':n', $nome);
            $query->bindValue(':e', $email);
            $query->bindValue(':t', $tel);
            $query->bindValue(':u', $user);
            $query->bindValue(':s', $senha);
            $query->bindValue(':p', $perm);
            $query->bindValue(':o', False);
            $query->execute();
            
            return True;

        } catch (PDOException $e){

            echo "Erro ". $e->getMessage();
            return False;
        }



    }
    public function edit($cod, $nome, $email, $telefone, $usu, $senha, $perm){
        try {
            
            $query = $this->conexao->prepare("update professor set nome_completo = :n, 
            email = :e, telefone = :t, usu_acesso = :ua, senha_acesso = :sa, permissao = :p, off = 0 where codigo= :cod");
          
            $query->bindValue(":n", $nome);
            $query->bindValue(":e", $email);
            $query->bindValue(":t", $telefone);
            $query->bindValue(":ua", $usu);
            $query->bindValue(":sa", $senha);
            $query->bindValue(":p", $perm);
            $query->bindValue(":cod", $cod);

            $query->execute();
            return True;
        } catch (PDOException $e){

            echo "Erro  ". $e->getMessage();
            return False;
        }



    }

    public function delete($cod){

        try {
            $query = $this->conexao->prepare("update professor set off = :b where codigo = :cod");
            
            $query->bindValue(':cod', $cod);
            $query->bindValue(':b', True);
            $query->execute();
            return True;
        } catch (PDOException $e){

            echo "Erro  ". $e->getMessage();
            return False;
        }
    }


}


?>
