
<?php 

if (isset( $_SESSION['cadNivel'])){

 if( $_SESSION['cadNivel']){

    echo  "<script>alert('Nivel cadastrado!');</script>";

 } else {

    echo  "<script>alert('Nao foi possivel cadastrar o nivel com sucesso!');</script>";
 }

 unset( $_SESSION['cadNivel']);

}


?>

<main class = 'main-item'>
    
    <div class = 'main-div-items'>
        
        
        
        <div class = 'lista'> 


           <div class = 'header-lista-items'>

            <a href="nivelController.php?acao=cadastrar"><h3> Clique aqui para cadastrar um nível</h3> </a>



            </div>
            
            <?php foreach($niveis as $nivel) {?>
            <div class = 'item'>

                <span class = 'nome-item'> <?= $nivel->getDescri()?> </span>

                <div class = 'opcoes'>

                    <a href="idiomaController.php?acao=excluir&cod=<?=$nivel->getCodigo() ?>" onclick="return confirm('Tem certeza de que deseja excluir este nivel?')"><span class = 'item-deletar'> Deletar </span> </a>
                    <!--<a href=""><span class = 'item-visu' onclick="visuAluno('Leonardo')"> Visualizar </span> </a>  !-->

                </div>

            </div>
            <?php } ?>

        </div>




    </div>

</main>


<script>

</script>


</body>