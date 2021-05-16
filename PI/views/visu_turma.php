
<div class = 'main-div-cad-item'>


<form class = 'cad-turma' method="POST" action="turmaController.php?acao=concluiedit">

<div>
        <h2 style = 'margin-bottom: 20px; color: rgb(19, 132, 167)'>Detalhes da Turma</h2>
        <span> <?= 'Professor: '.$prof->getNome_completo()?></span>
        <br>
        <span> <?= 'Email: '.$prof->getEmail()?></span>
        <br>
        <span> <?= 'Telefone: '.$prof->getTelefone()?></span>
        <br>
        <?php foreach($horario as $hor) {?>

            <span> <?= 'Dia: '.$hor['dia'].', hora: '.$hor['horario']?></span>
            <br>

        <?php } ?>
        <h3 style = 'margin-bottom: 20px; color: rgb(19, 132, 167); margin-top: 10px'>Alunos</h3>
        <?php foreach($alunos as $aluno) { ?>

                        <br>
                        <span style = 'color: rgb(40, 132, 167);'>
                        <?= $aluno->getNome_completo() ?>
                        </span>
                        <br>
                        <span>
                        <?= 'Telefone: '.$aluno->getTelefone() ?>
                        </span>
                        <br>
                        <span>
                        <?= 'Email: '.$aluno->getEmail() ?>
                        </span>
                        <br>
                        <span>
                        <?= 'Matricula: '.$aluno->getmatricula() ?>
                        </span>
                        <br>
                    
                
        <?php }?>

</div>

</form>
</div>






</body>