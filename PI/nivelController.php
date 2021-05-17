
<?php
if (!isset($_GET['acao'])){
    include "views/layout/header.php";
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

                    
                    header('Location: idiomaController.php');

                } else{

                   
                    header('Location: idiomaController.php');


                }
            }


        break;
        
        case 'cadastrar':
            include "views/layout/header.php";
            include "views/layout/menu.php";   
           
            require_once 'classes/NivelDAO.php';

            if (isset($_POST['cadnivel'])){

                if (isset($_POST['descri'])){

                    $nivelDAO = new NivelDAO();

                    $done = $nivelDAO->cadastrar($_POST['descri']);

                    if ($done){

                        
                        header('Location: nivelController.php');


                    } else {

                       
                        header('Location: nivelController.php');
                    }

                } else {

                    $_SESSION['cadIdiomaVazio'] = True;
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