<?php 

require_once '../../classes/ProfessorDAO.php';



if (isset($_POST["login"] ) && isset($_POST['pass']) && isset($_POST['entrar'])){


    $profDAO = new ProfessorDAO();
    
    $prof = $profDAO->logar($_POST['pass'], $_POST['login']);
   // print_r($prof);
    
    if (count($prof) ==  1) {
        $prof = $prof[0];
        //print_r($prof);
        session_start();
        $_SESSION['loged'] = True;
        $_SESSION['user'] = serialize($prof);
        header('Location: ../../index.php');
        

    } else {

        header('Location: ../../login.php');
    }
    
    
}

?>