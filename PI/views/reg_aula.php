
<?php

if (isset( $_SESSION['camposRegTurma']) ){

    if (  $_SESSION['camposRegTurma']){
        echo  "<script>alert('Complete todos os campos!');</script>";
        unset( $_SESSION['camposRegTurma']);

    } else {

        unset( $_SESSION['camposRegTurma']);


    }

}

if (isset($_SESSION['regAlunos'])){

    echo  "<script>alert('Verifique se todos os campos estao preenchidos corretamente!');</script>";

    unset( $_SESSION['regAlunos']);

}
?>
    <div class = 'main-div-cad-item-reg'>


        <form class = 'cad-turma' action = 'controleTurmaController.php?acao=reg&cod=<?= $_GET['cod']?>' method="POST">
        <h3 style = 'margin-bottom: 20px; color: rgb(19, 132, 167)'>Registro de aula</h3>
        
            
            <label class = "title" for= 'data'> Data</label>
            <input type="date" id="data" class="form-input" name="data" required>

            <label class = "title" for= 'conteudo'> Conteudo</label>
            <input type="text" id="conteudo" class="form-input" name="conteudo" placeholder="Conteúdo do dia" required maxlength="255" required>

            <label class = "title" for= 'obs'> Observação</label>
            <input type="text" id="obs" class="form-input" name="obs" placeholder="Observação" maxlength="255" >
           
            
            <label class = "title" > Adicione a presença dos alunos</label>
            <div class = 'pres-alunos'>
                <?php foreach($alunos as $aluno) {?>
                <div class = 'aluno-check'>
                    <label ><input type="checkbox" name="aluno[]" value="<?= $aluno->getMatricula()?>" >
                        <?= $aluno->getNome_completo().' '.$aluno->getMatricula()?>
                    </label>
                    <br>
                </div> 
                <?php } ?>
                


            </div>
 
                
            

            <input type="submit" name = 'reg' class="button-cad" value="Finalizar" >
            <br>
            
          
        </form>
        </div>
        
        
        <script>
        

        </script>
        
        
        
        </body>