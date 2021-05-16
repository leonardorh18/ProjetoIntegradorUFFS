
<?php 

//session_start();

if (isset($_SESSION['permFail'])){

    echo  "<script>alert('Voce nao tem permissao para acessar essa área!');</script>";
    unset($_SESSION['permFail']);

}
?>

<main class = 'main'>


    <h1>Selecione uma opção ao lado</h1>


</main>


</body>