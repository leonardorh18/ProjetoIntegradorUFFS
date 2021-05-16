
<?php 

require_once 'classes/Professor.php';
//session_start();
$user = unserialize($_SESSION['user']);

if ($user->getPermissao() !=1){

    $_SESSION['permFail'] = True;
    header('Location: index.php');
}


?>

<main class = 'main'>


    <div class = 'main-div-opcoes-cad'>

        <ul>
            <li> <a href="alunoController.php"><span> Cadastrar Aluno</span> </a> </li>
            <li> <a href="turmaController.php"><span> Cadastrar Turma</span> </a> </li>
            <li> <a href=" "><span> Cadastrar Idioma</span> </a> </li>
            <li> <a href=" "><span> Cadastrar Nível</span> </a> </li>
            

        </ul>
        


    </div>


</main>


</body>