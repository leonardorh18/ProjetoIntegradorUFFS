
<?php

require_once 'classes/Professor.php';
include "views/layout/header.php";
$prof = unserialize($_SESSION['user']);

if (!isset($_GET['acao'])){

    include "views/layout/menu.php";
    require_once 'classes/AnotacaoDAO.php';
    $anotDAO = new AnotacaoDAO();
    $anots = $anotDAO->listar($prof->getCodigo());
    include "views/anots.php";
    include "views/layout/footer.php";

}else {

    switch($_GET['acao']){


        case 'cad':

            if (isset($_POST['cadanot'])){

                if (isset($_POST['descri']) && isset($_POST['turma']) && isset($_POST['prior'])){

                    require_once 'classes/AnotacaoDAO.php';
                    $anotDAO = new AnotacaoDAO();
                    $done = $anotDAO->cadastrar($_POST['turma'], $_POST['descri'], $_POST['prior'], $prof->getCodigo());

                    if ($done == True){

                        $_SESSION['cadAnot'] = True;
                        header('Location: anotacaoController.php');

                    } else {


                        $_SESSION['cadAnot'] = False;
                        header('Location: anotacaoController.php');
                    }




                }
            } else {


                include "views/layout/menu.php";
                require_once 'classes/TurmaDAO.php';
                $turmaDAO = new TurmaDAO();
                $turmas = $turmaDAO->turmasByProf($prof->getCodigo());
                include 'views/cad_anot.php';
                include "views/layout/footer.php";


            }
        
        

        break;

        case 'deletar':

            if (isset($_GET['cod'])){

                require_once 'classes/AnotacaoDAO.php';
                $anotDAO = new AnotacaoDAO();
                $anotDAO->deletar($_GET['cod']);
            

            } 

            header('Location: anotacaoController.php');
               
            
        break;

       
    }
}

?>