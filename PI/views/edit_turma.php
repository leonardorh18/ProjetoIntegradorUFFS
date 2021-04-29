

<div class = 'main-div-cad-item'>


<form class = 'cad-turma'>
<h3 style = 'margin-bottom: 20px; color: rgb(19, 132, 167)'>Edição de turma</h3>
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

    
    <label for="data">Data de inicio da turma</label>
    <input type="date" id="data" class="form-input" name="data"  required>
    
    <fieldset class = 'dias-semana'>
        <label ><input type="checkbox"  name="aluno1" value="segunda" >
                Segunda feira
        </label>
        <br>
        <label ><input type="checkbox" name="aluno1" value="terca" >
                Terça feira
        </label>
        <br>
        <label ><input type="checkbox" name="aluno1" value="quarta" >
                Quarta feira
        </label>
        <br>
        <label ><input type="checkbox" name="aluno1" value="quinta" >
                Quinta feira
        </label>
        <br>
        <label ><input type="checkbox" name="aluno1" value="sexta" >
                Sexta feira
        </label>
        <br>
        <label ><input type="checkbox" name="aluno1" value="sabado" >
                Sabado 
        </label>
        <br>
    </fieldset>

    <label for="horario">Descreva o horário</label>
    <input type="text" id="horario" class="form-input" name="horario" placeholder="Descreva o horário" required>
    
    <input type="button" class="button-cad" value="Edite os alunos"  onclick="addAlunos()">
    <br>
    
</form>
</div>


<script>

    function addAlunos (){

        window.location.replace("index.php?view=cad_turma_alunos");
    }
</script>



</body>