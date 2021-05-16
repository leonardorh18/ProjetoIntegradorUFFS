

    <div class = 'main-div-cad-item'>


<form class = 'cad-turma' action="turmaController.php?acao=addaluno", method ='POST'>

<div>
        <h2>Adicione os alunos da turma</h2>
        <?php foreach($alunos as $aluno) {?>
        <div class = 'aluno-check'>
            <label ><input type="checkbox" name="alunos[]" value="<?= $aluno->getMatricula()?>" >
                <?= $aluno->getNome_completo().', matrícula: '.$aluno->getMatricula()?>
            </label>
            <br>
        </div>
        <?php } ?>

       

</div>

<input type="submit" class="button-cad" value="Finalizar" name = 'addalunos'>
</form>
</div>






</body>