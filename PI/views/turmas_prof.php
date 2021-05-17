

<?php 
if (isset($_SESSION['regDone'] )){


    if ($_SESSION['regDone'] ){

        
        echo  "<script>alert('Registro cadastrado com sucesso!');</script>";

    } else {

        echo  "<script>alert('Não foi possivel concluir o registro!');</script>";
        
    }
    unset($_SESSION['regDone'] );
}

if (isset($_SESSION['encTurma'])){

    if($_SESSION['encTurma']){

        echo  "<script>alert('Turma encerrada!');</script>";

    } else {

        echo  "<script>alert('Não foi possivel encerrar a turma!');</script>";

    }

    unset($_SESSION['encTurma']);

}
?>


<main class = 'main-item'>
    
    <div class = 'main-div-items'>
        
        
        
        <div class = 'lista'> 


           <div class = 'header-lista-items'>

            <a><h3> Suas turmas </h3> </a>



            </div>
        <?php foreach($turmas as $turma) {?>
            <div class = 'item'>

                <span class = 'nome-item'> <?= 'Turma: '.$turma->getCodigo().' '.$turma->getCodIdioma().' '.$turma->getCodNivel()?> </span>

                <div class = 'opcoes'>
                    
                    <a href="controleTurmaController.php?acao=enc&cod=<?=$turma->getCodigo()?>"><span class = 'item-encerrar' onclick="return confirm('Tem certeza que deseja encerrar esta turma?')"> Encerrar turma </span> </a>
                    <a href="controleTurmaController.php?acao=alunos&cod=<?=$turma->getCodigo()?>"><span class = 'item-alunos' onclick=""> Alunos </span> </a>
                    <a href="controleTurmaController.php?acao=reg&cod=<?=$turma->getCodigo() ?>"><span class = 'item-registro' > Adicionar registro</span> </a>
                    <!--<a href=""><span class = 'item-visu' onclick="visuAluno('Leonardo')"> Visualizar </span> </a>  !-->

                </div>

            </div>
            <?php  } ?>

        </div>




    </div>

</main>




</body>