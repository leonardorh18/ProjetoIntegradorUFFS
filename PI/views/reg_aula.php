

    <div class = 'main-div-cad-item-reg'>


        <form class = 'cad-turma'>
        
            <div class = 'select'  style="width:200px;">
                <select class="select-css">
                    <option value="0">Selecione o Professor</option>
                    <option value="1">Claudio</option>
                    <option value="2">Mara</option>
                    <option value="3">Glauci</option>
         
                </select>
            </div>
        
            <div class = 'horario'>
            <label class = "title" for= 'data'> Data</label>
            <input type="date" id="data" class="form-input" name="horario" placeholder="Data" required>

            <label class = "title" for= 'horario'> Horario</label>
            <input type="datetime" id="horario" class="form-input" name="horario" placeholder="Horario" required>

            <label class = "title" for= 'conteudo'> Conteudo</label>
            <input type="text" id="conteudo" class="form-input" name="horario" placeholder="Conteúdo do dia" required maxlength="100">

            <label class = "title" for= 'obs'> Observação</label>
            <input type="text" id="obs" class="form-input" name="horario" placeholder="Observação" maxlength="100" >
           
            
            <label class = "title" > Aicione a presença dos alunos</label>
            <div class = 'pres-alunos'>
                <div class = 'aluno-check'>
                    <label ><input type="checkbox" name="aluno1" value="Fulano" >
                        Artur Moreira - X819823
                    </label>
                    <br>
                </div> 
                <div class = 'aluno-check'>
                    <label ><input type="checkbox" name="aluno1" value="Fulano" >
                        Artur Moreira - X819823
                    </label>
                    <br>
                </div> 
                <div class = 'aluno-check'>
                    <label ><input type="checkbox" name="aluno1" value="Fulano" >
                        Artur Moreira - X819823
                    </label>
                    <br>
                </div> 
                <div class = 'aluno-check'>
                    <label ><input type="checkbox" name="aluno1" value="Fulano" >
                        Artur Moreira - X819823
                    </label>
                    <br>
                </div> 
                <div class = 'aluno-check'>
                    <label ><input type="checkbox" name="aluno1" value="Fulano" >
                        Artur Moreira - X819823
                    </label>
                    <br>
                </div> 
                <div class = 'aluno-check'>
                    <label ><input type="checkbox" name="aluno1" value="Fulano" >
                        Artur Moreira - X819823
                    </label>
                    <br>
                </div> 


            </div>
 
                
            

            <input type="button" class="button-cad" value="Finalizar registro"  onclick="addAlunos()">
            <br>
            
          
        </form>
        </div>
        
        
        <script>
        
            function addAlunos (){
        
                window.location.replace("index.php?view=cad_turma_alunos");
            }
        </script>
        
        
        
        </body>