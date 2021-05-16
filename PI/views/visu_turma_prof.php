
<main class = 'main-item'>
    
    <div class = 'main-div-items'>
        
        
    <span style = 'font-size: 30px; margin-bottom: 20px; color: rgb(19, 132, 167)'>Horário(s)</span>

    <div>
           <?php foreach($horario as $hor) {?>

            <span> <?= 'Dia: '.$hor['dia'].', hora: '.$hor['horario']?></span>
            <br>

            <?php } ?>

    </div>

        <span style = 'font-size: 30px;padding-bottom: 20px; margin-top: 20px; color: rgb(19, 132, 167)'>Alunos</span>
        
        <div class = 'lista'> 
            

            <?php 
                foreach($alunos as $aluno){
            ?>
            <div class = 'item'>

                <span class = 'nome-item'> <?= $aluno->getNome_completo() ?> </span>

                <div class = 'opcoes'>

                    
                    <a href="alunoController.php?acao=deletar&mat=<?=$aluno->getMatricula()?>" onclick="return confirm('Tem certeza de que deseja excluir este aluno?')"><span class = 'item-deletar'> Avaliações </span> </a>
                    <a href=""><span class = 'item-visu' onclick="return window.alert('Matricula: <?= $aluno->getMatricula()?> \n Aluno: <?= $aluno->getNome_completo()?> \n Telefone: <?= $aluno->getTelefone()?> \n Email: <?= $aluno->getEmail()?>');"> Registrar Avaliação </span> </a>

                </div>

            </div>
            <?php } ?>

        </div>




    </div>

</main>






</body>