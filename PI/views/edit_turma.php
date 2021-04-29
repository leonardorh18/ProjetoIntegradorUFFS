

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
    
    <div class = 'dias-semana'>
        <label ><input type="checkbox" id = 'segunda'name="aluno1" value="segunda" onclick="horaSeg()" >
                Segunda feira
        </label>
        <br>
        <label ><input type="checkbox"  id = 'terca' name="aluno1" value="terca" onclick="horaTer()" >
                Terça feira
        </label>
        <br>
        <label ><input type="checkbox" id = 'quarta' name="aluno1" value="quarta"onclick="horaQua()" >
                Quarta feira
        </label>
        <br>
        <label ><input type="checkbox"  id ='quinta' name="aluno1" value="quinta" onclick="horaQui()">
                Quinta feira
        </label>
        <br>
        <label ><input type="checkbox" id = 'sexta' name="aluno1" value="sexta" onclick="horaSex()">
                Sexta feira
        </label>
        <br>
        <label ><input type="checkbox"  id = 'sabado' name="aluno1" value="sabado" onclick="horaSab()">
                Sabado 
        </label>
        <br>
    </div>
    
    <label for="horseg" style="display: none;" id = 'lhorseg'> Hora da segunda</label>
    <input type="time" id="horseg" class="form-input-hora" name="horseg" placeholder="Horario da segunda" >

    <label for="horter" style="display: none;" id = 'lhorter'> Hora da terça</label>
    <input type="time" id="horter" class="form-input-hora" name="horter" placeholder="Horario da terca" >

    <label for="horqua" style="display: none;" id = 'lhorqua'> Hora da quarta</label>
    <input type="time" id="horqua" class="form-input-hora" name="horqua" placeholder="Horario da quarta" >

    <label for="horqui" style="display: none;" id = 'lhorqui'> Hora da quinta</label>
    <input type="time" id="horqui" class="form-input-hora" name="horqui" placeholder="Horario da quinta" >

    <label for="horsex" style="display: none;" id = 'lhorsex'> Hora da sexta</label>
    <input type="time" id="horsex" class="form-input-hora" name="horsex" placeholder="Horario da sexta" >

    <label for="horsab" style="display: none;" id = 'lhorsab'> Hora do sabado</label>
    <input type="time" id="horsab" class="form-input-hora" name="horsab" placeholder="Horario do sabado" >

    <label for="horario">Descreva o horário</label>
    <input type="text" id="horario" class="form-input" name="horario" placeholder="Descreva o horário" required>
    
    <input type="button" class="button-cad" value="Editar Alunos"  onclick="addAlunos()">
    <br>
    
</form>
</div>


<script >

    function horaSeg(){

    input = document.getElementById('horseg');
    label = document.getElementById('lhorseg');

    if (input.style.display == 'block' && label.style.display == 'block'){

        label.style.display = 'none';
        input.style.display = 'none';
        
    } else {

        label.style.display = 'block';
        input.style.display = 'block';

    }


    }

    function horaTer(){

    input = document.getElementById('horter');
    
    label = document.getElementById('lhorter');

    if (input.style.display == 'block' && label.style.display == 'block'){

        label.style.display = 'none';
        input.style.display = 'none';
        
    } else {

        label.style.display = 'block';
        input.style.display = 'block';

    }

    }

    function horaQua(){

    input = document.getElementById('horqua');
    label = document.getElementById('lhorqua');

    if (input.style.display == 'block' && label.style.display == 'block'){

        label.style.display = 'none';
        input.style.display = 'none';
        
    } else {

        label.style.display = 'block';
        input.style.display = 'block';

    }


    }  
    function horaQui(){

    input = document.getElementById('horqui');

    label = document.getElementById('lhorqui');

    if (input.style.display == 'block' && label.style.display == 'block'){

        label.style.display = 'none';
        input.style.display = 'none';
        
    } else {

        label.style.display = 'block';
        input.style.display = 'block';

    }

    }

    function horaSex(){

    input = document.getElementById('horsex');
    label = document.getElementById('lhorsex');

    if (input.style.display == 'block' && label.style.display == 'block'){

        label.style.display = 'none';
        input.style.display = 'none';
        
    } else {

        label.style.display = 'block';
        input.style.display = 'block';

    }


    }

    function horaSab(){

    input = document.getElementById('horsab');
    label = document.getElementById('lhorsab');

    if (input.style.display == 'block' && label.style.display == 'block'){

        label.style.display = 'none';
        input.style.display = 'none';
        
    } else {

        label.style.display = 'block';
        input.style.display = 'block';

    }

    }

    function addAlunos (){

    window.location.replace("index.php?view=cad_turma_alunos");
    }


</script>


</body>