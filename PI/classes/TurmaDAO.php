<?php
    require_once 'Turma.php';
    require_once 'Aluno.php';
    require_once 'Professor.php';
    require_once 'conexao.php';
class TurmaDAO{

    public $conexao;

    public function __construct(){
        $this->conexao = Conexao::conecta();
    }

    public function delete($cod){
        try {

            
            $query = $this->conexao->prepare("delete from matricula where codTurma = :cod");
            $query->bindValue(":cod", $cod);
            $query->execute();

            $query = $this->conexao->prepare("delete from dia_aula where codTurma = :cod");
            $query->bindValue(":cod", $cod);
            $query->execute();

            $query = $this->conexao->prepare("delete from registro where codTurma = :cod");
            $query->bindValue(":cod", $cod);
            $query->execute();

            $query = $this->conexao->prepare("delete from turma where codigo = :cod");
            $query->bindValue(":cod", $cod);
            $query->execute();


            return True;


        } catch (PDOException $e){

            echo "Erro ao deletar ". $e->getMessage();
            return False;
        }



    }

    public function buscar($cod){

        try{
            $query = $this->conexao->prepare("select * from turma where codigo = :cod");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");
            $query->bindValue(":cod", $cod);
            $query->execute();
            $turma = $query->fetchAll(PDO::FETCH_CLASS, "Turma");
            return $turma[0];


        } catch (PDOException $e){

            return False;
        }


    }
    public function buscarAlunos($cod){

        try{
            $query = $this->conexao->prepare("select distinct a.* from aluno a inner join matricula m on m.codTurma = :cod and m.matAluno = a.matricula ");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");
            $query->bindValue(":cod", $cod);
            $query->execute();
            $alunos = $query->fetchAll(PDO::FETCH_CLASS, "Aluno");
            return $alunos;


        } catch (PDOException $e){

            return False;
        }


    }
    public function turmasByProf($cod, $enc = True){

        try{
            if ($enc){

                $query = $this->conexao->prepare("select t.data_ini as data_ini, t.data_enc as data_enc, t.codigo as codigo, n.descri as codNivel, i.descri as codIdioma, p.nome_completo as 
                codProf from turma t left join nivel n on n.codigo = t.codNivel 
                left join idioma i on i.codigo = t.codIdioma left join professor p on p.codigo = t.codProf where t.codProf = :cod and data_enc is null
                order by t.codigo asc;");
                $query->bindValue(":cod", $cod);
                $query->execute();
                $turmas = $query->fetchAll(PDO::FETCH_CLASS, "Turma");
                return $turmas;

            } else {

                $query = $this->conexao->prepare("select t.data_ini as data_ini, t.data_enc as data_enc, t.codigo as codigo, n.descri as codNivel, i.descri as codIdioma, p.nome_completo as 
                codProf from turma t left join nivel n on n.codigo = t.codNivel 
                left join idioma i on i.codigo = t.codIdioma left join professor p on p.codigo = t.codProf 
                where t.codProf = :cod 
                order by t.codigo asc;");
                $query->bindValue(":cod", $cod);
                $query->execute();
                $turmas = $query->fetchAll(PDO::FETCH_CLASS, "Turma");
                return $turmas;

            }



        } catch (PDOException $e){

           echo $e;
        }


    }

    public function encTurma($cod){

        try{
            $query = $this->conexao->prepare("update turma set data_enc = :dt where codigo = :cod");
            $query->bindValue(":cod", $cod);
            $query->bindValue(":dt", date("Y-m-d"));
            $query->execute();
            
            return True;


        } catch (PDOException $e){
            return False;
           echo $e;
        }


    }

    public function buscarProf($cod){

        try{
            $query = $this->conexao->prepare("select p.* from professor p inner join turma t on t.codProf = p.codigo where t.codigo = :cod");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");
            $query->bindValue(":cod", $cod);
            $query->execute();
            $prof = $query->fetchAll(PDO::FETCH_CLASS, "Professor");
            return $prof[0];


        } catch (PDOException $e){

            return False;
        }


    }
    public function buscarHorario($cod){

        try{
            $query = $this->conexao->prepare("select da.horario, di.dia from dia_aula da inner join dia di on di.codigo = da.codDia where da.codTurma = :cod");
            //$query = $this->conexao->prepare("select * from professor where usu_acesso = :u and senha_acesso = :s");
            $query->bindValue(":cod", $cod);
            $query->execute();
            $horario = $query->fetchAll();
            return $horario;


        } catch (PDOException $e){

            return False;
        }


    }
    public function listar(){

        try{
            $query = $this->conexao->prepare("select t.codigo as codigo, n.descri as codNivel, i.descri as codIdioma, p.nome_completo as 
            codProf from turma t left join nivel n on n.codigo = t.codNivel 
            left join idioma i on i.codigo = t.codIdioma left join professor p on p.codigo = t.codProf 
            order by t.codigo asc;");
            $query->execute();
            $turmas = $query->fetchAll(PDO::FETCH_CLASS, "Turma");
            return $turmas;


        } catch (PDOException $e){

           echo $e;
        }
    }
    public function cadastra($codhor, $prof, $nivel, $idioma, $dtini, $alunos){

       // print_r($codhor);
        //var_dump($codhor);
        try {//echo 'diioma '.$prof.'  ';
        $query = $this->conexao->prepare("select AUTO_INCREMENT as auto 
        FROM information_schema.TABLES
        WHERE TABLE_SCHEMA = :ts
        AND TABLE_NAME = :tn");
        $con = new Conexao();
        $query->bindValue(':ts', $con->getBdName());
        //$query->bindValue(':ts', 'pi');
        $query->bindValue(':tn', 'turma');
        $query->execute();
        $cod = $query->fetch();
        $cod = $cod['auto'];

       /* echo '   '.$cod.'   ';
        if (empty($cod) == 1){

            $cod = 1;

        } else {

            $cod ++;

        }*/
        //echo '   '.$cod.'   ';
        $query = $this->conexao->prepare("insert into turma (codIdioma, codNivel, codProf, data_ini) values (:ci, :cn, :cp, :di)");
        $query->bindValue(':ci', $idioma);
        $query->bindValue(':cn', $nivel);
        $query->bindValue(':cp', $prof);
        $query->bindValue(':di', $dtini);
        $query->execute();

        for ($i = 0; $i < count($codhor); $i = $i+2){

            $query = $this->conexao->prepare("insert into dia_aula (horario, codTurma, codDia) values (:h, :ct, :cd)");
            $query->bindValue(':h', $codhor[$i+1]);
            $query->bindValue(':ct', $cod);
            $query->bindValue(':cd', $codhor[$i]);
            $query->execute();
            //echo $codhor[$i].' '.$codhor[$i+1].' ';
        }
        foreach($alunos  as $aluno){

            $query = $this->conexao->prepare("insert into matricula (matAluno, codTurma, data) values (:ma, :ct, :dt)");
            $query->bindValue(':ma', $aluno);
            $query->bindValue(':ct', $cod);
            $query->bindValue(':dt', date("Y-m-d"));
            $query->execute();
        }
        return True;
     } catch (PDOException $e){
        return False;
        echo "ERRO ao cadastrar turma ". $e;

     }

    }

    public function editTurma($codhor, $codturma, $prof, $nivel, $idioma, $dtini, $alunos){

        try {

            $query = $this->conexao->prepare("delete from matricula where codTurma = :cod");
            $query->bindValue(":cod", $codturma);
            $query->execute();

            $query = $this->conexao->prepare("delete from dia_aula where codTurma = :cod");
            $query->bindValue(":cod", $codturma);
            $query->execute();

            $query = $this->conexao->prepare("update cliente set nome = :n, 
            email = :e, telefone = :t, dataNascimento = :dt, senha = :s, endereco = :end, bairro = :b, observacoes = :obs where codigo = :cod");

            $query = $this->conexao->prepare("update turma set codNivel = :cn, codProf = :cp, codIdioma = :ci, data_ini= :di where codigo = :cod");
            $query->bindValue(':ci', $idioma);
            $query->bindValue(':cn', $nivel);
            $query->bindValue(':cp', $prof);
            $query->bindValue(':di', $dtini);
            $query->bindValue(':cod', $codturma);
            $query->execute();
    
            for ($i = 0; $i < count($codhor); $i = $i+2){
    
                $query = $this->conexao->prepare("insert into dia_aula (horario, codTurma, codDia) values (:h, :ct, :cd)");
                $query->bindValue(':h', $codhor[$i+1]);
                $query->bindValue(':ct', $codturma);
                $query->bindValue(':cd', $codhor[$i]);
                $query->execute();
                //echo $codhor[$i].' '.$codhor[$i+1].' ';
            }
            foreach($alunos  as $aluno){
    
                $query = $this->conexao->prepare("insert into matricula (matAluno, codTurma, data) values (:ma, :ct, :dt)");
                $query->bindValue(':ma', $aluno);
                $query->bindValue(':ct', $codturma);
                $query->bindValue(':dt', date("Y-m-d"));
                $query->execute();
            }
            return True;
         } catch (PDOException $e){
            return False;
            echo "ERRO ao cadastrar turma ". $e;
    
         }       

    }


}
?>