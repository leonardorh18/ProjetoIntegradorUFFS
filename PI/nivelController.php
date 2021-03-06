
<?php

require_once 'classes/Professor.php';
include "views/layout/header.php";
$user = unserialize($_SESSION['user']);

if ($user->getPermissao() !=1){

    $_SESSION['permFail'] = True;
    header('Location: index.php');
}

if (!isset($_GET['acao'])){
    
    include "views/layout/menu.php";
    require_once 'classes/NivelDAO.php';
    $nivelDAO = new NivelDAO();
    $niveis = $nivelDAO->listar();
    include "views/niveis.php";
    include "views/layout/footer.php";

}else {

    switch($_GET['acao']){

       case 'excluir':
        require_once 'classes/NivelDAO.php';
            if(isset($_GET['cod'])){

                $nivelDAO = new NivelDAO();
                $done = $nivelDAO->delete($_GET['cod']);

                if ($done){

                    
                    header('Location: nivelController.php');

                } else{

                   
                    header('Location: nivelController.php');


                }
            }


        break;
        
        case 'cadastrar':
            //include "views/layout/header.php";
            include "views/layout/menu.php";   
           
            require_once 'classes/NivelDAO.php';

            if (isset($_POST['cadnivel'])){

                if (isset($_POST['descri'])){

                    $nivelDAO = new NivelDAO();

                    $done = $nivelDAO->cadastrar($_POST['descri']);

                    if ($done){

                        $_SESSION['cadNivel'] = True;
                        header('Location: nivelController.php');


                    } else {

                        $_SESSION['cadNivel'] = False;
                        header('Location: nivelController.php');
                    }

                } else {

                    
                    header('Location: nivelController.php?acao=cadastrar');

                }

            } else {

                include "views/cad_nivel.php";
                include "views/layout/footer.php";

            }

        break;
    }
}

?>