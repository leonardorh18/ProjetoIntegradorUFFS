
<?php
if (!isset($_GET['acao'])){
    include "views/layout/header.php";
    include "views/layout/menu.php";
    require_once 'classes/TurmaDAO.php';
    require_once 'classes/ProfessorDAO.php';
    $turmaDAO = new TurmaDAO();
    $prof = unserialize($_SESSION['user']);
    $turmas = $turmaDAO->turmasByProf($prof->getCodigo());
    include "views/turmas_prof.php";
    include "views/layout/footer.php";
}else{

    switch($_GET['acao']){

        case 'alunos':
            require_once 'classes/TurmaDAO.php';
            require_once 'classes/RegistroDAO.php';
            include "views/layout/header.php";
            include "views/layout/menu.php";
            if (isset($_GET['cod'])){

                $turmaDAO = new TurmaDAO();
                $alunos = $turmaDAO->buscarAlunos($_GET['cod']);
                $horario = $turmaDAO->buscarHorario($_GET['cod']);
                include "views/visu_turma_prof.php";
                


            } else {

                header('Location: controleTurmaController.php');

            }




        break;


        case 'reg':
            require_once 'classes/TurmaDAO.php';
            require_once 'classes/RegistroDAO.php';
            include "views/layout/header.php";
            include "views/layout/menu.php";
            if (isset($_POST['reg']) && isset($_GET['cod'])){

                if ( isset($_POST['conteudo']) && isset($_POST['data']) && isset($_POST['aluno'])){

                    $alunos = $_POST['aluno'];

                    if (count($alunos)>0){

                        $regDAO = new RegistroDAO();
                        $done = $regDAO->cadastra($_GET['cod'], $alunos, $_POST['obs'], $_POST['conteudo'], $_POST['data']);

                        if ($done){
    
                            $_SESSION['regDone'] = True;
                            header('Location: controleTurmaController.php');

                        } else{
    
                            $_SESSION['regDone'] = False;
                            header('Location: controleTurmaController.php');
    
                        }


                    } else {

                        $_SESSION['regAlunos'] = True;
                        header('Location: controleTurmaController.php?acao=reg&cod='.$_GET['cod']);


                    }


                } else {

                    $_SESSION['camposRegTurma'] = True;
                    header('Location: controleTurmaController.php?acao=reg&cod='.$_GET['cod']);



                }


            } else if (isset($_GET['cod'])) {


                
                $turmaDAO = new TurmaDAO();
                $alunos = $turmaDAO->buscarAlunos($_GET['cod']);
                include "views/reg_aula.php";
                include "views/layout/footer.php";

                

            }
        break;

        case 'enc':
            require_once 'classes/TurmaDAO.php';
            if (isset($_GET['cod'])){

                session_start();
                $turmaDAO = new TurmaDAO();
                $done = $turmaDAO->encTurma($_GET['cod']);
                if ($done == True){

                    $_SESSION['encTurma'] = True;
                    header('Location: controleTurmaController.php');

                } else {

                    $_SESSION['encTurma'] = False;
                    header('Location: controleTurmaController.php');
                }


            }
        break;
        
    }
}

?>