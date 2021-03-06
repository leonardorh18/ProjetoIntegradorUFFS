
<?php

include_once 'classes/AlunoDAO.php';
include_once 'classes/Aluno.php';


if (isset($_SESSION['cadAlunoDone'])){
    if ($_SESSION['cadAlunoDone']){

        echo  "<script>alert('Aluno cadastrado com sucesso!');</script>";
        unset($_SESSION['cadAlunoDone']);
    } else {

        echo  "<script>alert('Aluno nao foi cadastrado corretamente');</script>";
        unset($_SESSION['cadAlunoDone']);
    }

}

if (isset($_SESSION['editAlunoDone'])){
    if ($_SESSION['editAlunoDone']){

        echo  "<script>alert('Aluno editado com sucesso!');</script>";
        unset($_SESSION['editAlunoDone']);
    } else {

        echo  "<script>alert('Aluno nao foi editado corretamente');</script>";
        unset($_SESSION['editAlunoDone']);
    }

} 

if (isset($_SESSION['vazio'])){
    if ($_SESSION['vazio']){

        echo  "<script>alert('Nenhum aluno listado');</script>";
        unset($_SESSION['vazio']);
    } 
} 



?>



<main class = 'main-item'>
    
    <div class = 'main-div-items'>
        
        
        
        <div class = 'lista'> 


           <div class = 'header-lista-items'>

            <a href="alunoController.php?acao=cadastrar"><h3> Clique aqui para cadastrar um aluno </h3> </a>

            <div class = 'procura-item'>

                <form action="alunoController.php?acao=procura" method = 'POST'>
                    
                    <input type="text" id="searchAluno" class="input-search-item" name="searchName" placeholder="Nome do aluno" required>

                    <input type="submit" class="button-search-item" name ='search' value="Procurar"  >

                </form>
                

            </div>

            </div>

            <?php 
                foreach($alunos as $aluno){
            ?>
            <div class = 'item'>

                <span class = 'nome-item'> <?= $aluno->getNome_completo() ?> </span>

                <div class = 'opcoes'>

                
                    <span  style = 'color: #009999 '><?= $aluno->getStatus_mat() == 0 ?'Inativo' : 'Ativo'?></span>
                    <a href="alunoController.php?acao=editar&mat=<?=$aluno->getMatricula()?>"><span class = 'item-editar' onclick=""> Editar </span> </a>
                    <a href="alunoController.php?acao=deletar&mat=<?=$aluno->getMatricula()?>" onclick="return confirm('Tem certeza de que deseja Ativar/Deletar este aluno?')"><span class = 'item-deletar'> Deletar/Ativar </span> </a>
                    <a href=""><span class = 'item-visu' onclick="return window.alert('Matricula: <?= $aluno->getMatricula()?> \n Aluno: <?= $aluno->getNome_completo()?> \n Telefone: <?= $aluno->getTelefone()?> \n Email: <?= $aluno->getEmail()?>');"> Visualizar </span> </a>

                </div>

            </div>
            <?php } ?>

        </div>




    </div>

</main>


<script>

</script>


</body>