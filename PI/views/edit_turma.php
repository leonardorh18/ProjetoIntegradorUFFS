<?php 

if(isset($_SESSION['camposEditTurma'])){

    if ($_SESSION['camposEditTurma']){

        echo  "<script>alert('Preencha todos os campos');</script>";
        unset($_SESSION['camposEditTurma']);
    }
}
?>

<div class = 'main-div-cad-item'>


<form class = 'cad-turma' action = 'turmaController.php?acao=editar' method = 'POST'>
<h3 style = 'margin-bottom: 20px; color: rgb(19, 132, 167)'>Edição de turma</h3>
<span style="padding-bottom: 20px; font-size: 13px;">Idioma</span>
    <div class = 'select'  style="width:200px;">
        <select class="select-css" name = 'idioma'>
        <option value = "<?= $turma->getCodIdioma()?>"> <?= $sameIdioma ?> </option>
            <?php foreach($idiomas as $idioma) {?>
            <option value="<?= $idioma->getCodigo()?>"> <?= $idioma->getDescri() ?></option>
            <?php } ?>
        </select>
    </div>
    <span style="padding-bottom: 20px; font-size: 13px;">Nivel</span>
    <div class="select" style="width:200px;">
    <select class="select-css" name = 'nivel'>
    <option value = "<?= $turma->getCodNivel()?>"> <?= $sameNivel ?> </option>
            <?php foreach($niveis as $nivel) {?>
            <option value="<?= $nivel->getCodigo()?>"> <?= $nivel->getDescri() ?></option>
            <?php } ?>
 
        </select>
    </div>
    <span style="padding-bottom: 20px; font-size: 13px;">Professor</span>
    <div class="select" style="width:200px;">
        <select class="select-css" name = 'professor'>
        <option value = "<?= $turma->getCodProf()?>"> <?= $sameProf ?> </option>
            <?php foreach($professores as $professor) {?>
            <option value="<?= $professor->getCodigo()?>"> <?= $professor->getNome_completo() ?></option>
            <?php } ?>
        </select>
    </div>

    
    <label for="data">Data de inicio da turma</label>
    <input type="date" id="data" class="form-input" name="dtini" value = '<?= $turma->getData_ini()?>' required>

    <span style="padding-bottom: 20px; font-size: 20px;">Dias de aula(s) da turma</span>

    <div class = 'dias-semana'>
    <?php foreach($dias as $dia) { ?>

        <br>

        <label ><input type="checkbox" name="diasem[]" value='<?= $dia->getCodigo().'-'.$dia->getDia() ?>' onclick="hora( '<?= $dia->getDia()?>')" >
                <?= $dia->getDia()?>
        </label>


        <?php } ?>
        
    </div>
    
    <label for="horseg" style="display: none;" id = 'lhorsegunda'> Horario da segunda</label>
    <input type="time" id="horsegunda" class="form-input-hora" name="horsegunda" placeholder="Horario da segunda" >

    <label for="horter" style="display: none;" id = 'lhorterca'> Horario da terça</label>
    <input type="time" id="horterca" class="form-input-hora" name="horterca" placeholder="Horario da terca" >

    <label for="horqua" style="display: none;" id = 'lhorquarta'> Horario da quarta</label>
    <input type="time" id="horquarta" class="form-input-hora" name="horquarta" placeholder="Horario da quarta" >

    <label for="horqui" style="display: none;" id = 'lhorquinta'> Horario da quinta</label>
    <input type="time" id="horquinta" class="form-input-hora" name="horquinta" placeholder="Horario da quinta" >

    <label for="horsex" style="display: none;" id = 'lhorsexta'> Horario da sexta</label>
    <input type="time" id="horsexta" class="form-input-hora" name="horsexta" placeholder="Horario da sexta" >

    <label for="horsab" style="display: none;" id = 'lhorsabado'> Horario do sabado</label>
    <input type="time" id="horsabado" class="form-input-hora" name="horsabado" placeholder="Horario do sabado" >

    
    <input type="submit" class="button-cad" value="Editar Alunos" name = 'editaluno' >
    <br>
    
</form>
</div>


<script >

    function hora(dia){
    console.log(dia)
    input = document.getElementById('hor'+dia);
    label = document.getElementById('lhor'+dia);

    if (input.style.display == 'block' && label.style.display == 'block'){

        label.style.display = 'none';
        input.style.display = 'none';
        
    } else {

        label.style.display = 'block';
        input.style.display = 'block';

    }


    }




</script>



</body>