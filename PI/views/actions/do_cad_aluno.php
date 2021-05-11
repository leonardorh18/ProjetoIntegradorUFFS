<?php 


require_once '../../classes/AlunoDAO.php';
session_start();
if (isset($_POST['nomeCompleto']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['matricula'])){

    $alunoDAO = new AlunoDAO();
    $done = $alunoDAO->cadastrar($_POST['matricula'], $_POST['email'], $_POST['nomeCompleto'], $_POST['tel']);
    if ($done){
       
        $_SESSION['cadAlunoDone'] = True;

    } else {
        $_SESSION['cadAlunoDone'] = False;
        header("Location: ../../index.php?view=alunos");
    }
    

} else {

    header("Location: ../../index.php?view=alunos");

}
?>
