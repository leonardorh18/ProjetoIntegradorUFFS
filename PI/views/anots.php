
<?php

include_once 'classes/AnotacaoDAO.php';
include_once 'classes/Anotacao.php';

if (isset($_SESSION['cadAnot'])){

    if($_SESSION['cadAnot']){

        echo  "<script>alert('Anotação cadastrada');</script>";

    } else {

        echo  "<script>alert('Nao foi possivel cadastrar a anotação');</script>";

    }

    unset($_SESSION['cadAnot']);
}


?>



<main class = 'main-item'>
    
    <div class = 'main-div-items'>
        
        
        
        <div class = 'lista'> 


           <div class = 'header-lista-items'>

            <a href="anotacaoController.php?acao=cad"><h3> Clique aqui para cadastrar uma Anotação </h3> </a>

            </div>

            <?php 
                foreach($anots as $anot){
            ?>
            <div class = 'item'>

                <span class = 'nome-item'> <?= $anot->getDescri() ?> </span>

                <div class = 'opcoes'>

                    <span class = 'item-editar' onclick=""> <?= $anot->getPrior() == 1 ? 'Alta' : 'Baixa'?> </span> 
                    <span class = 'item-visu' onclick=""> <?= 'Turma: '.$anot->getCodTurma()?> </span> 
                    <a href="anotacaoController.php?acao=deletar&cod=<?=$anot->getCodigo()?>" onclick="return confirm('Tem certeza de que deseja excluir esta anotação?')"><span class = 'item-deletar'> Deletar </span> </a>
                    

                </div>

            </div>
            <?php } ?>

        </div>




    </div>

</main>


<script>

</script>


</body>