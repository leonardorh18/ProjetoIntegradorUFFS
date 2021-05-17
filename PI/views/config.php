
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
            <li> <a href="professorController.php"><span> Configuração de contas</span> </a> </li>
            <li> <a href="minhacontaController.php"><span> Minha conta</span> </a> </li>

            

        </ul>
        


    </div>


</main>


</body>