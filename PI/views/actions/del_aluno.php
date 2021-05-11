<?php
require_once '../../classes/Aluno.php';
require_once '../../classes/Professor.php';
require_once '../../classes/AlunoDAO.php';

session_start();


if (isset($_SESSION['user']) && isset($_GET['mat'])){

    $user = unserialize($_SESSION['user']);

    if ($user->getPermissao() == 1) {

        $alunoDAO = new AlunoDAO();
        $alunoDAO->delete($_GET['mat']);

        header("Location: ../../index.php?view=alunos");
        
    } else {
        echo 'nao tem permissao';
        header("Location: ../../index.php?view=alunos");
    }



} else {
    echo 'nao tem acesso' ;
    header("Location: ../../index.php?view=alunos");
}

?>