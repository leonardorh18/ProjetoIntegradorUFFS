
<?php



if (isset($_SESSION['cadIdioma'])){

    if ($_SESSION['cadIdioma']){

        echo  "<script>alert('Idioma cadastrado!');</script>";
    } else {

        echo  "<script>alert('Nao foi possivel cadastrar o idioma!');</script>";
    }

    unset($_SESSION['cadIdioma']);

}

if (isset($_SESSION['cadIdiomaVazio'])){

    if ($_SESSION['cadIdiomaVazio']){

        echo  "<script>alert('Complete todos os campos!');</script>";
    } 

    unset($_SESSION['cadIdiomaVazio']);

}
?>



<main class = 'main-item'>
    
    <div class = 'main-div-items'>
        
        
        
        <div class = 'lista'> 


           <div class = 'header-lista-items'>

            <a href="idiomaController.php?acao=cadastrar"><h3> Clique aqui para cadastrar um idioma </h3> </a>



            </div>
            
            <?php foreach($idiomas as $idioma) {?>
            <div class = 'item'>

                <span class = 'nome-item'> <?= $idioma->getDescri()?> </span>

                <div class = 'opcoes'>

                    <a href="idiomaController.php?acao=excluir&cod=<?=$idioma->getCodigo() ?>" onclick="return confirm('Tem certeza de que deseja excluir este idioma?')"><span class = 'item-deletar'> Deletar </span> </a>
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