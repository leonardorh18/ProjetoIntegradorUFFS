
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

                    
                    <a href="#"><span class = 'item-deletar'> Notas </span> </a>
                    <a href=""><span class = 'item-visu' > Registrar Avaliação </span> </a>

                </div>

            </div>
            <?php } ?>

        </div>




    </div>

</main>






</body>