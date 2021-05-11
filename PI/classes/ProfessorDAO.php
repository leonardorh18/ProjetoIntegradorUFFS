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


}


?>
