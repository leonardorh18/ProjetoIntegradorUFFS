<?php

function isChecked($aluno, $alunosTurma){

    foreach($alunosTurma as $alunoTurma){

        if ($aluno->getMatricula() == $alunoTurma->getMatricula()){

            return True;
        }

    }
    return False;

}
?>

<div class = 'main-div-cad-item'>


<form class = 'cad-turma' method="POST" action="turmaController.php?acao=concluiedit">

<div>
        <h2>Edite os alunos da turma</h2>
       
        <?php foreach($alunos as $aluno) {
            if ($aluno->getStatus_mat() == 1){
            if (isChecked($aluno, $alunosTurma)) {
                    ?>
                    <div class = 'aluno-check'>
                        <label ><input type="checkbox" name="alunos[]" value="<?= $aluno->getMatricula()?>" checked>
                            <?= $aluno->getNome_completo().', matrícula: '.$aluno->getMatricula()?>
                        </label>
                        <br>
                    </div>
                
                <?php } else { ?>
                    <div class = 'aluno-check'>
                        <label ><input type="checkbox" name="alunos[]" value="<?= $aluno->getMatricula()?>" >
                            <?= $aluno->getNome_completo().', matrícula: '.$aluno->getMatricula()?>
                        </label>
                        <br>
                    </div>
        <?php }}}?>

</div>

<input type="submit" class="button-cad" value="Finalizar edição" name = 'addalunos' >
</form>
</div>






</body>