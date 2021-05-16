<?php
if (!isset($_GET['acao'])){
    include "views/layout/header.php";
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
                include "views/layout/header.php";
                include "views/layout/menu.php";
                include "views/alunos.php";
                include "views/layout/footer.php";

            }


        break;

        case 'cadastrar':
            if (isset($_POST['cadaluno'])){
               
            require_once 'classes/AlunoDAO.php';
            session_start();
            if (isset($_POST['nomeCompleto']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['matricula'])){

                $alunoDAO = new AlunoDAO();
                $done = $alunoDAO->cadastrar($_POST['matricula'], $_POST['email'], $_POST['nomeCompleto'], $_POST['tel']);
                
                if ($done){
                
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

            include "views/layout/header.php";
            include "views/layout/menu.php";
            include "views/cad_aluno.php";
            include "views/layout/footer.php";
            }


        break;


        case 'deletar':

            require_once 'classes/Aluno.php';
            require_once 'classes/Professor.php';
            require_once 'classes/AlunoDAO.php';

            session_start();


            if (isset($_SESSION['user']) && isset($_GET['mat'])){

                $user = unserialize($_SESSION['user']);

                if ($user->getPermissao() == 1) {

                    $alunoDAO = new AlunoDAO();
                    $alunoDAO->delete($_GET['mat']);

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
            include "views/layout/header.php";
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

