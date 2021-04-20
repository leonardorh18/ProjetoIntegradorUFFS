

<div class = 'main-div-cad-item'>


<form class = 'cad-turma'>

    <div class = 'select'  style="width:200px;">
        <select class="select-css">
            <option value="0">Selecione o Professor</option>
            <option value="1">Claudio</option>
            <option value="2">Mara</option>
            <option value="3">Glauci</option>
 
        </select>
    </div>

    <div class="select" style="width:200px;">
    <select class="select-css">
            <option value="0">Selecione o nível</option>
            <option value="1">Kids</option>
            <option value="2">Iniciante</option>
            <option value="3">Avançando</option>
 
        </select>
    </div>

    <div class="select" style="width:200px;">
        <select class="select-css">
            <option value="0">Selecione o idioma</option>
            <option value="1">Espanhol</option>
            <option value="2">Inglês</option>
            <option value="3">Francês</option>
 
        </select>
    </div>

    <div class = 'horario'>
    <input type="text" id="horario" class="form-input" name="horario" placeholder="Descreva o horário" required>
    <div>
    
    
    <input type="button" class="button-cad" value="Adicionar Alunos"  onclick="addAlunos()">
    <br>
    
</form>
</div>


<script>

    function addAlunos (){

        window.location.replace("index.php?view=cad_turma_alunos");
    }
</script>



</body>