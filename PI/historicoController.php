
<?php
if (!isset($_GET['acao'])){
    include "views/layout/header.php";
    include "views/layout/menu.php";
    include "views/historicos.php";
    include "views/layout/footer.php";
}else{

    switch($_GET['acao']){

        case 'reg':
            include "views/layout/header.php";
            include "views/layout/menu.php";
            require_once 'classes/TurmaDAO.php';
            require_once 'classes/ProfessorDAO.php';
            $turmaDAO = new TurmaDAO();
            $prof = unserialize($_SESSION['user']);
            $turmas = $turmaDAO->turmasByProf($prof->getCodigo(), enc:False);
            include "views/hist_turmas_prof.php";
            include "views/layout/footer.php";

        break;

        case 'verreg':

            include "views/layout/header.php";
            include "views/layout/menu.php";
            require_once 'classes/RegistroDAO.php';
        

            if (isset($_GET['cod'])){

                $regDAO = new RegistroDAO();
                $regs = $regDAO->buscarByTurma($_GET['cod']);
                include "views/hist_reg.php";
                include "views/layout/footer.php";
    


            } else {

                header('Location: controleTurmaController.php?acao=reg');
                
            }

        break;

        case 'detreg':
            include "views/layout/header.php";
            include "views/layout/menu.php";
            require_once 'classes/RegistroDAO.php';

            if (isset($_GET['cod'])){

                $regDAO = new RegistroDAO();
                $reg = $regDAO->buscarByCod($_GET['cod']);
                $alunos = $regDAO->buscarPresAlunos($_GET['cod']);
                include "views/hist_det_reg.php";
                include "views/layout/footer.php";


            } else {

                header('Location: historicoController.php?acao=reg');

            }
        break;

        case 'editreg':
            include "views/layout/header.php";
            include "views/layout/menu.php";
            require_once 'classes/RegistroDAO.php';
            require_once 'classes/TurmaDAO.php';

            if(isset($_POST['edit']) && isset($_GET['cod'])  && isset($_GET['codT'])){
            
                if ( isset($_POST['data']) && isset($_POST['conteudo']) && isset($_POST['obs']) && isset($_POST['aluno']) ){

                    $regDAO = new RegistroDAO();
                    $alunos = $_POST['aluno'];
                    if (count($alunos) == 0){

                        $_SESSION['editRegComplete'] = False;
                        header('Location: historicoController.php?acao=editreg&cod='.$_GET['cod'].'&codT='.$_GET['codT']);

                    } else {

                        $done = $regDAO->editReg($_GET['cod'], $_POST['obs'], $_POST['conteudo'], $_POST['data'], $alunos);
                        if ($done == True){

                            $_SESSION['editRegDone'] = True;
                            header('Location: historicoController.php?acao=reg');

                        } else {
                            
                            $_SESSION['editRegDone'] = False;
                            $_SESSION['editRegERRO'] = $done;
                           header('Location: historicoController.php?acao=reg');
                           
                        }
                }

                } else {

                    $_SESSION['editRegComplete'] = True;
                    header('Location: historicoController.php?acao=editreg&cod='.$_GET['cod'].'&codT='.$_GET['codT']);
                }

            } else if (isset($_GET['cod']) && isset($_GET['codT'])){

                
                $regDAO = new RegistroDAO();
                $turmaDAO = new TurmaDAO();
                $reg = $regDAO->buscarByCod($_GET['cod']);
                $alunos = $turmaDAO->buscarAlunos($_GET['codT']);
                $alunosP = $regDAO->buscarPresAlunos($_GET['cod']);
                include "views/hist_edit_reg.php";
                include "views/layout/footer.php";


            } else {

                header('Location: historicoController.php?acao=reg');

            }
        break;

        case 'delreg':
            require_once 'classes/RegistroDAO.php';
            if (isset($_GET['cod']) && isset($_GET['codT'])){
                $regDAO = new RegistroDAO();
                $done = $regDAO->deleteReg($_GET['cod']);
                session_start();
                if ($done == True){
                    $_SESSION['deleteReg'] = True;
                    header('Location: historicoController.php?acao=verreg&cod='.$_GET['codT']);
                    
                } else {

                    $_SESSION['deleteReg'] = False;
                    header('Location: historicoController.php?acao=verreg&cod='.$_GET['codT']);


                }

            } else {

                header('Location: historicoController.php?acao=reg');
            }
        break;

        
    }
}

?>