<?php 
require_once 'Idioma.php';
require_once 'conexao.php';
class IdiomaDAO{

    public $conexao;

    public function __construct(){
        $this->conexao = Conexao::conecta();
    }

    public function listar(){

        try {
            $query = $this->conexao->prepare("select * from idioma order by descri asc");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");

            $query->execute();
            $idiomas = $query->fetchAll(PDO::FETCH_CLASS, "Idioma");
            return $idiomas;
        } catch (PDOException $e){

            echo "Erro no login ". $e->getMessage();
            return False;
        }
    }


}
?>
