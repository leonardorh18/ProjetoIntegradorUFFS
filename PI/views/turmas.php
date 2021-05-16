
<?php

if (isset( $_SESSION['turmaEdit']) ){

    if ( $_SESSION['turmaEdit']){
        echo  "<script>alert('Turma editada com sucesso!');</script>";
        unset($_SESSION['turmaEdit']);

    } else {

        echo  "<script>alert('Turma NÃO FOI editada com sucesso!');</script>";
        unset($_SESSION['turmaEdit']);


    }

}
?>



<main class = 'main-item'>
    
    <div class = 'main-div-items'>
        
        
        
        <div class = 'lista'> 


           <div class = 'header-lista-items'>

            <a href="turmaController.php?acao=cadastrar"><h3> Clique aqui para cadastrar uma turma </h3> </a>



            </div>

            <?php foreach($turmas as $turma) {?>
            <div class = 'item'>

                <span class = 'nome-item'> <?= 'Turma: '.$turma->getCodigo().' '.$turma->getCodIdioma().' '.$turma->getCodNivel()?> </span>

                <div class = 'opcoes'>

                    <a href="turmaController.php?acao=editar&cod=<?=$turma->getCodigo()?>"><span class = 'item-editar' onclick=""> Editar </span> </a>
                    <a href="turmaController.php?acao=exibir&cod=<?=$turma->getCodigo()?>"><span class = 'item-visu' onclick=""> Visualizar </span> </a>
                    <a href="turmaController.php?acao=excluir&cod=<?=$turma->getCodigo() ?> &idi= <?=$turma->getCodIdioma() ?>&nvl=<?=$turma->getNivel()?>" onclick="return confirm('Tem certeza de que deseja excluir esta turma?')"><span class = 'item-deletar'> Deletar </span> </a>
                    <!--<a href=""><span class = 'item-visu' onclick="visuAluno('Leonardo')"> Visualizar </span> </a>  !-->

                </div>

            </div>
            <?php } ?>

        </div>




    </div>

</main>


<script>
    function deleteAluno(nome){

        if (confirm("Você realmente que excluir "+nome+"?")){

            window.alert("Excluindo "+nome);
        }
    }

    function visuAluno(nome){
        nomes = '';
        nome = 'leo'
        for (i = 0; i < 15; i = i + 1){

            nomes = nomes + "\n" + nome;

        }
        window.alert("Aluno: "+nomes+"? \n Muito lindo");

    }
</script>


</body>