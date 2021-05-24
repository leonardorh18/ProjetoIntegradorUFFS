
<?php


if (isset( $_SESSION['editRegComplete']) ){

    if (  $_SESSION['editRegComplete']){
        echo  "<script>alert('Complete todos os campos!');</script>";
      

    } 

    unset( $_SESSION['editRegComplete']);




}

?>
    <div class = 'main-div-cad-item-reg'>


        <form class = 'cad-turma' action = 'historicoController.php?acao=editreg&cod=<?= $_GET['cod']?>&codT=<?=$_GET['codT']?>' method="POST">
        <h3 style = 'margin-bottom: 20px; color: rgb(19, 132, 167)'>Registro de aula </h3>
        
            
            <label class = "title" for= 'data'> Data</label>
            <input type="date" id="data" class="form-input" name="data" value = '<?= $reg->getdata()?>' required>

            <label class = "title" for= 'conteudo'> Conteudo</label>
            <input type="text" id="conteudo" class="form-input" name="conteudo" value = '<?= $reg->getConteudo()?>' placeholder="Conteúdo do dia" required maxlength="255" required>

            <label class = "title" for= 'obs'> Observação</label>
            <input type="text" id="obs" class="form-input" name="obs" value = '<?= $reg->getObs()?>'  placeholder="Observação" maxlength="255" >
           
            
            <label class = "title" > Adicione a presença dos alunos</label>
            <div class = 'pres-alunos'>
                <?php foreach($alunosP as $aluno) {
                    
                    if ($aluno->getStatus_pres() == 1) {?>

                    <div class = 'aluno-check'>
                        <label > <input type="checkbox" name="aluno[]" value="<?= $aluno->getMatricula()?>" checked>  
                            <?= $aluno->getNome_completo().' '.$aluno->getMatricula()?>
                        </label>
                        <br>
                    </div>

                    <?php } else { ?>

                        <div class = 'aluno-check'>
                        <label > <input type="checkbox" name="aluno[]" value="<?= $aluno->getMatricula()?>">  
                            <?= $aluno->getNome_completo().' '.$aluno->getMatricula()?>
                        </label>
                        <br>
                    </div>
 
                <?php }} ?>
                


            </div>
 
                
            

            <input type="submit" name = 'edit' class="button-cad" value="Finalizar" >
            <br>
            
          
        </form>
        </div>
        
        
        <script>
        

        </script>
        
        
        
        </body>