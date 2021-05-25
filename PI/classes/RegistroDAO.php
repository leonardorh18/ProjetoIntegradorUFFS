<?php

require_once 'Registro.php';
require_once 'Aluno.php';
require_once 'conexao.php';

class RegistroDAO{

    public $conexao;

    public function __construct(){
        $this->conexao = Conexao::conecta();
    }


    public function cadastra($codTurma, $alunos, $obs, $cont, $data){

        try {
            $query = $this->conexao->prepare("select AUTO_INCREMENT as auto 
            FROM information_schema.TABLES
            WHERE TABLE_SCHEMA = :ts
            AND TABLE_NAME = :tn");
            $con = new Conexao();
            $query->bindValue(':ts', $con->getBdName());
            //$query->bindValue(':ts', 'pi');
            $query->bindValue(':tn', 'registro');
            $query->execute();
            $cod = $query->fetch();
            $cod = $cod['auto'];

            $query = $this->conexao->prepare("insert into registro (obs, conteudo, data, codTurma) values 
            (:ob, :co, :dt, :ct)");
            $query->bindValue(':ob', $obs); 
            $query->bindValue(':co', $cont);  
            $query->bindValue(':ct', $codTurma);  
            $query->bindValue(':dt', $data);    
            $query->execute();
            
            $turmaDAO = new TurmaDAO();
            $alunosT = $turmaDAO->buscarAlunos($codTurma);
            $reg = new Registro();
            foreach($alunosT as $aluno){

                if ($reg->isPresent($aluno, $alunos)){

                    $query = $this->conexao->prepare("insert into presenca (codRegistro, status_pres, matAluno) values 
                    (:cod, :st, :mt)");
    
                    $query->bindValue(':cod', $cod);
                    $query->bindValue(':st', 1);
                    $query->bindValue(':mt', $aluno->getMatricula());
                    $query->execute();


                } else {

                    $query = $this->conexao->prepare("insert into presenca (codRegistro, status_pres, matAluno) values 
                    (:cod, :st, :mt)");
    
                    $query->bindValue(':cod', $cod);
                    $query->bindValue(':st', 0);
                    $query->bindValue(':mt', $aluno->getMatricula());
                    $query->execute();
                }

            }
            return True;

        } catch (PDOException $e){

            echo "Erro no login ". $e->getMessage();
            return False;
        }
    }

    public function buscarByTurma($cod){

        try{

            
            $query = $this->conexao->prepare("select * from registro where codTurma = :cod order by data desc");

            $query->bindValue(':cod', $cod);
            $query->execute();
            $regs = $query->fetchAll(PDO::FETCH_CLASS, "Registro");
            return $regs;


        }catch (PDOException $e){

            echo $e;
            return False;
        }


    }

    public function buscarPresAlunos($cod){

        try{

            
            $query = $this->conexao->prepare("select a.*, p.status_pres from aluno a inner join presenca p on p.matAluno = a.matricula
            where p.codRegistro = :cod");

            $query->bindValue(':cod', $cod);
            $query->execute();
            $alunos = $query->fetchAll(PDO::FETCH_CLASS, "Aluno");
            return $alunos;


        }catch (PDOException $e){

            echo $e;
            return False;
        }


    }
    public function deleteReg($cod){

        try{

            $query = $this->conexao->prepare("delete from presenca where codRegistro = :cod");
            $query->bindValue(":cod", $cod);
            $query->execute();

            $query = $this->conexao->prepare("delete from registro where codigo = :cod");
            $query->bindValue(":cod", $cod);
            $query->execute();
            
            return True;


        } catch (PDOException $e){
            return False;
           echo $e;
        }


    }

    public function buscarByCod($cod){

        try{

            
            $query = $this->conexao->prepare("select * from registro where codigo = :cod");

            $query->bindValue(':cod', $cod);
            $query->execute();
            $reg = $query->fetchAll(PDO::FETCH_CLASS, "Registro");
            return $reg[0];


        }catch (PDOException $e){

            echo $e;
            return False;
        }


    }

    
    public function editReg($codreg, $obs, $cont, $data, $alunos){

        try {

            $query = $this->conexao->prepare("delete from presenca where codRegistro = :cod");
            $query->bindValue(":cod", $codreg);
            $query->execute();

            $query = $this->conexao->prepare("update registro set 
            conteudo = :n,
            obs = :ob,
            data = :dt 
            where codigo = :cod");
            $query->bindValue(":n", $cont);
            $query->bindValue(":ob", $obs);
            $query->bindValue(":dt", $data);
            $query->bindValue(":cod", $codreg);
            $query->execute();

            $query = $this->conexao->prepare("select codTurma from registro where codigo = :cod");
            $query->bindValue(":cod", $codreg);
            $query->execute();
            $codTurma = $query->fetch();
            $turmaDAO = new TurmaDAO();
            $alunosT = $turmaDAO->buscarAlunos($codTurma['codTurma']);
            echo 'codigo turmaaaaa '.$codTurma['codTurma'];
            print_r($alunos);
            $reg = new Registro();
            foreach($alunosT as $aluno){

                if ($reg->isPresent($aluno, $alunos)){

                    $query = $this->conexao->prepare("insert into presenca (codRegistro, status_pres, matAluno) values 
                    (:cod, :st, :mt)");
    
                    $query->bindValue(':cod', $codreg);
                    $query->bindValue(':st', 1);
                    $query->bindValue(':mt', $aluno->getMatricula());
                    $query->execute();


                } else {

                    $query = $this->conexao->prepare("insert into presenca (codRegistro, status_pres, matAluno) values 
                    (:cod, :st, :mt)");
    
                    $query->bindValue(':cod', $codreg);
                    $query->bindValue(':st', 0);
                    $query->bindValue(':mt', $aluno->getMatricula());
                    $query->execute();
                }

            }
            return True;

         } catch (PDOException $e){
            return $e;
            echo "ERRO ao cadastrar turma ". $e;
    
         }       

    }



}

?>