<?php 

if(isset($_SESSION['camposCadTurma'])){

    if ($_SESSION['camposCadTurma']){

        echo  "<script>alert('Preencha todos os campos');</script>";
        unset($_SESSION['camposCadTurma']);
    }
}
?>

<div class = 'main-div-cad-item'>


<form class = 'cad-turma' action="anotacaoController.php?acao=cad" method="POST">

<h3 style = 'margin-bottom: 20px; color: rgb(19, 132, 167)'>Anotações</h3>
<label for="descri"> Descrição </label>
<input type="text" id="descri" class="form-input" name="descri" placeholder="Descrição" maxlength="255"  required>

    <span style="padding-bottom: 20px; font-size: 13px;">Turma</span>
    <div class="select" style="width:200px;">
        <select class="select-css" name = 'turma'>
           
            <?php foreach($turmas as $turma) {?>
            <option value="<?= $turma->getCodigo()?>"> <?= 'Turma: '.$turma->getCodigo() ?></option>
            <?php } ?>
        </select>
    </div>

    <span style="padding-bottom: 20px; font-size: 13px;">Prioridade</span>
    <div class="select" style="width:200px;">
        <select class="select-css" name = 'prior'>
           
            <option value="1"> Alta </option>
            <option value="0"> Baixa </option>
            
        </select>
    </div>


    
    
    <input type="submit" class="button-cad" value="Adicionar" name = 'cadanot' >
    <br>
    
</form>
</div>


<script >

 


</script>



</body>