<?php

require_once 'classes/Professor.php';
include "views/layout/header.php";
$user = unserialize($_SESSION['user']);

if ($user->getPermissao() !=1){

    $_SESSION['permFail'] = True;
    header('Location: index.php');
}



if (!isset($_GET['acao'])){
    //include "views/layout/header.php";
    include "views/layout/menu.php";
    require_once 'classes/AlunoDAO.php';
    $alunoDAO = new AlunoDAO();
    $alunos = $alunoDAO->listar();
    include "views/alunos.php";
    include "views/layout/footer.php";
}else{

    switch($_GET['acao']){
        case 'procura':

            if (isset($_POST['search'])){

                require_once 'classes/AlunoDAO.php';
                $alunoDAO = new AlunoDAO();
                $alunos = $alunoDAO->listarName($_POST['searchName']);
                if (count($alunos) == 0){
                    session_start();
                    $_SESSION['vazio'] = True;
                    header("Location: alunoController.php");

                }
                //include "views/layout/header.php";
                include "views/layout/menu.php";
                include "views/alunos.php";
                include "views/layout/footer.php";

            }


        break;

        case 'cadastrar':
            if (isset($_POST['cadaluno'])){
               
            require_once 'classes/AlunoDAO.php';
            require_once 'classes/Aluno.php';
            session_start();
            if (isset($_POST['nomeCompleto']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['matricula'])){

                if (empty($_POST['matricula']) == True || empty($_POST['nomeCompleto']) == True || empty($_POST['email']) == True || empty($_POST['tel']) == True){

                    $_SESSION['camposAlunoCad'] = True;
                    header("Location: alunoController.php?acao=cadastrar");
                    break;

                }

                $alunoDAO = new AlunoDAO();
                $done = $alunoDAO->cadastrar($_POST['matricula'], $_POST['email'], $_POST['nomeCompleto'], $_POST['tel']);
                
                if ($done == True){
                
                    $_SESSION['cadAlunoDone'] = True;
                   
                    header("Location: alunoController.php");

                } else {
                    $_SESSION['cadAlunoDone'] = False;
                    
                    header("Location: alunoController.php");
                }
                

            } else {

                header("Location: alunoController.php");

            }

            } else{

            //include "views/layout/header.php";
            include "views/layout/menu.php";
            include "views/cad_aluno.php";
            include "views/layout/footer.php";
            }


        break;


        case 'deletar':

            require_once 'classes/Aluno.php';
            require_once 'classes/Professor.php';
            require_once 'classes/AlunoDAO.php';

            


            if (isset($_SESSION['user']) && isset($_GET['mat'])){

                $user = unserialize($_SESSION['user']);

                if ($user->getPermissao() == 1) {

                    $alunoDAO = new AlunoDAO();
                    $aluno = $alunoDAO->buscarAluno($_GET['mat']);
                    echo $aluno->getStatus_mat();

                    if ($aluno->getStatus_mat() == 1){

                        $alunoDAO->activeInactive($_GET['mat'], 0);

                    }else  {

                        $alunoDAO->activeInactive($_GET['mat'], 1);

                    }
                    

                    header("Location: alunoController.php");
                    
                } else {
                    echo 'nao tem permissao';
                    header("Location: alunoController.php");
                }



            } else {
                echo 'nao tem acesso' ;
                
            }


        break;


        case 'editar':
            require_once 'classes/AlunoDAO.php';
            require_once 'classes/Aluno.php';
            //include "views/layout/header.php";
            include "views/layout/menu.php";
             if (isset($_GET['mat'])){
                $alunoDAO = new AlunoDAO();
                $aluno = $alunoDAO->selectByMat($_GET['mat']);
                
                

                if (count($aluno) == 1){

                    $aluno = $aluno[0];
                    
                    $_SESSION['matAtual'] = $aluno->getMatricula();
                    
                } else {
                    
                    header("Location: alunoController.php");
                }


                include "views/edit_aluno.php";
                include "views/layout/footer.php";


            } else {
                
                header("Location: alunoController.php");

            }




        break;
        
        case 'concluiedit':
            require_once 'classes/AlunoDAO.php';
            session_start();
            if (isset($_POST['edit'])){
                
                if (empty($_POST['matricula']) == True || empty($_POST['nomeCompleto']) == True || empty($_POST['email']) == True || empty($_POST['tel']) == True){

                    $_SESSION['camposAlunoEdit'] = True;
                    header("Location: alunoController.php?acao=editar&mat=".$_SESSION['matAtual']);
                    break;

                }

                $alunoDAO = new AlunoDAO();
                $done = $alunoDAO->edit($_SESSION['matAtual'], $_POST['matricula'],  $_POST['email'], $_POST['nomeCompleto'], $_POST['tel']);

                if ($done){
                    
                    unset($_SESSION['matAtual']);
                    $_SESSION['editAlunoDone'] = True;
                    header("Location: alunoController.php");
                    

                } else {

                    unset($_SESSION['matAtual']);
                    $_SESSION['editAlunoDone'] = False;
                    header("Location: alunoController.php");
                    

                }

                

            }

        break;
    }

}
?>

