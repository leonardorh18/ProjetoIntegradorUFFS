
<?php


if (isset($_SESSION['cadprof'])){

     if($_SESSION['cadprof']){

        echo  "<script>alert('Professor cadastrado');</script>";

     } else {


        echo  "<script>alert('Não foi possivel cadastrar o professor. Verifique se o Email ou usuário ja estao cadastrados');</script>";

     }

     unset($_SESSION['cadprof']);


}

if (isset($_SESSION['cadprofPre'])){


    echo  "<script>alert('Preencha todos os campos');</script>";
    unset($_SESSION['cadprofPre']);


}

if (isset($_SESSION['editprof'])){

    if($_SESSION['editprof']){

       echo  "<script>alert('Professor editado');</script>";

    } else {


       echo  "<script>alert('Não foi possivel editar o professor. Verifique se o Email ou usuário ja estao cadastrados');</script>";

    }

    unset($_SESSION['editprof']);


}






?>



<main class = 'main-item'>
    
    <div class = 'main-div-items'>
        
        
        
        <div class = 'lista'> 


           <div class = 'header-lista-items'>

            <a href="professorController.php?acao=cadastrar"><h3> Clique aqui para cadastrar uma conta </h3> </a>

            </div>

            <?php 
                foreach($profes as $prof){
            ?>
            <div class = 'item'>

                <span class = 'nome-item'> <?= $prof->getNome_completo() ?> </span>

                <div class = 'opcoes'>

                <span  style = 'color: #009999 '><?= $prof->getStatus_ativ() == 0 ?'Inativo' : 'Ativo'?></span>
                    <a href="professorController.php?acao=editar&cod=<?=$prof->getCodigo()?>"><span class = 'item-editar' onclick=""> Editar </span> </a>
                    <a href="professorController.php?acao=excluir&cod=<?=$prof->getCodigo()?>" onclick="return confirm('Tem certeza de que deseja Deletar/Ativar este aluno?')"><span class = 'item-deletar'> Deletar/Ativar </span> </a>
                    <a href=""><span class = 'item-visu' onclick="return window.alert('Codigo: <?= $prof->getCodigo()?> \n professor: <?= $prof->getNome_completo()?> \n Telefone: <?= $prof->getTelefone()?> \n Email: <?= $prof->getEmail()?>');"> Visualizar </span> </a>

                </div>

            </div>
            <?php } ?>

        </div>




    </div>

</main>


<script>


</script>


</body>