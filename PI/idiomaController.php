
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
    require_once 'classes/IdiomaDAO.php';
    $idiomaDAO = new IdiomaDAO();
    $idiomas = $idiomaDAO->listar();
    include "views/idiomas.php";
    include "views/layout/footer.php";

}else {

    switch($_GET['acao']){

       case 'excluir':
        require_once 'classes/IdiomaDAO.php';
            if(isset($_GET['cod'])){

                $idiomaDAO = new IdiomaDAO();
                $done = $idiomaDAO->delete($_GET['cod']);

                if ($done){

                    
                    header('Location: idiomaController.php');

                } else{

                   
                    header('Location: idiomaController.php');


                }
            }


        break;
        
        case 'cadastrar':
            //include "views/layout/header.php";
            include "views/layout/menu.php";   
           
            require_once 'classes/IdiomaDAO.php';

            if (isset($_POST['cadidioma'])){

                if (isset($_POST['descri'])){

                    $idiomaDAO = new IdiomaDAO();

                    $done = $idiomaDAO->cadastrar($_POST['descri']);

                    if ($done){
                        $_SESSION['cadIdioma'] = True;
                        header('Location: idiomaController.php');


                    } else {

                        $_SESSION['cadIdioma'] = False;
                        header('Location: idiomaController.php');
                    }

                } else {

                    $_SESSION['cadIdiomaVazio'] = True;
                    header('Location: idiomaController.php?acao=cadastrar');

                }

            } else {

                include "views/cad_idioma.php";
                include "views/layout/footer.php";

            }

        break;
    }
}

?>