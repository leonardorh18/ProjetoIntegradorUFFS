
<?php



include "views/layout/header.php";
include "views/layout/menu.php";
require_once 'classes/ProfessorDAO.php';
$prof = unserialize($_SESSION['user']);

if ($prof->getPermissao() != 1){

    $_SESSION['permFail'] = True;
    header('Location: index.php');

}

if (!isset($_GET['acao'])){

    require_once 'classes/ProfessorDAO.php';
    $profDAO = new ProfessorDAO();
    $profes = $profDAO->listar();

    include "views/professores.php";
    include "views/layout/footer.php";
}else{

    switch($_GET['acao']){
        case 'concluiredit':
            require_once 'classes/ProfessorDAO.php';


            if (isset($_POST['editprof'])){

                if (isset($_POST['nomeCompleto'] ) 
                && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['senha'])
                && isset($_POST['user']) && isset($_POST['perm']) ){

                    if (empty($_POST['nomeCompleto']) == True || empty($_POST['email']) == True || empty($_POST['tel']) == True || empty($_POST['senha']) == True
                    || empty($_POST['user']) == True || empty($_POST['perm']) == True){

                        $_SESSION['cadprofPre'] = True;
                        header('Location: professorController.php');
                        break;
    
                    }

                    if (strlen($_POST['senha']) < 6 ){

                        $_SESSION['editprofsenha'] = True;
                        header('Location: professorController.php?acao=editar&cod='.$_SESSION['codProfEdit']);
                        break;

                    } 

                    $profDAO = new ProfessorDAO();
                    $done = $profDAO->edit(
                    $_SESSION['codProfEdit'],
                    $_POST['nomeCompleto'],
                    $_POST['email'],
                    $_POST['tel'],
                    $_POST['user'],
                    $_POST['senha'],
                    $_POST['perm'],
                    );

                    if ($done == True){

                        $_SESSION['editprof'] = True;
                        unset($_SESSION['codProfEdit'] );
                        header('Location: professorController.php');

                    } else {

                        $_SESSION['editprof'] = False;
                        unset($_SESSION['codProfEdit'] );
                        header('Location: professorController.php');

                    }
                

                }
            } else {

                header('Location: professorController.php');
            }

        break;
        case 'editar':

            require_once 'classes/ProfessorDAO.php';

            if (isset($_GET['cod'])){
                $_SESSION['codProfEdit'] = $_GET['cod'];
                $profDAO = new ProfessorDAO();
                $prof = $profDAO->buscarProf($_GET['cod']);
                include "views/edit_prof.php";
                include "views/layout/footer.php";


            } else{

                header('Location: professorController.php');
                
            }

        break;


        case 'cadastrar':
            require_once 'classes/ProfessorDAO.php';
   
        
            if (isset($_POST['cadprof'])){

                if (isset($_POST['nomeCompleto'] ) 
                && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['senha'])
                && isset($_POST['user']) && isset($_POST['perm']) ){

                    if (empty($_POST['nomeCompleto']) == True || empty($_POST['email']) == True || empty($_POST['tel']) == True || empty($_POST['senha']) == True
                    || empty($_POST['user']) == True || empty($_POST['perm']) == True){

                        $_SESSION['cadprofPre'] = True;
                        header('Location: professorController.php');
                        break;
    
                    }

                    if (strlen($_POST['senha']) < 6 ){

                        $_SESSION['cadprofsenha'] = True;
                        header('Location: professorController.php?acao=cadastrar');
                        break;
                    }

                    $profDAO = new ProfessorDAO();
                    $done = $profDAO->cadastrar(
                        $_POST['nomeCompleto'],
                        $_POST['email'],
                        $_POST['tel'],
                        $_POST['user'],
                        $_POST['senha'],
                        $_POST['perm'],

                    );

                    if ($done == True){
                        $_SESSION['cadprof'] = True;
                        header('Location: professorController.php');

                        
                    } else {

                        $_SESSION['cadprof'] = False;
                        header('Location: professorController.php');
                    }

                }else {

                        $_SESSION['cadprofcampos'] = True;
                        header('Location: professorController.php?acao=cadastrar');

                }


            } else {

               
                include "views/cad_prof.php";
                include "views/layout/footer.php";

            }

        break;


        case 'excluir':
            require_once 'classes/ProfessorDAO.php';
            if(isset($_GET['cod'])){

                $profDAO = new ProfessorDAO();
                $prof = $profDAO->buscarProf($_GET['cod']);
                if ($prof->getStatus_ativ() == 1){

                    $profDAO->delete($_GET['cod'], False);

                } else {

                    $profDAO->delete($_GET['cod'], True);
                }
                
                header('Location: professorController.php');
            }
        break;

        
    }
}

?>