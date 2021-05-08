

    <div class = 'main-div-cad-item-reg'>


        <form class = 'cad-turma'>
        <h3 style = 'margin-bottom: 20px; color: rgb(19, 132, 167)'>Registro de aula da turma XXXX</h3>
        
            
            <label class = "title" for= 'data'> Data</label>
            <input type="date" id="data" class="form-input" name="horario" required>

            <label class = "title" for= 'conteudo'> Conteudo</label>
            <input type="text" id="conteudo" class="form-input" name="horario" placeholder="Conteúdo do dia" required maxlength="100">

            <label class = "title" for= 'obs'> Observação</label>
            <input type="text" id="obs" class="form-input" name="horario" placeholder="Observação" maxlength="100" >
           
            
            <label class = "title" > Adicione a presença dos alunos</label>
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
 
                
            

            <input type="button" class="button-cad" value="Finalizar"  onclick="addAlunos()">
            <br>
            
          
        </form>
        </div>
        
        
        <script>
        
            function addAlunos (){
        
                window.location.replace("index.php?view=cad_turma_alunos");
            }
        </script>
        
        
        
        </body>