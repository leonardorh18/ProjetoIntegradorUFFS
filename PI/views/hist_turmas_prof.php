

<?php 

if (isset($_SESSION['editRegDone'] )){

    if ($_SESSION['editRegDone'] == True ){

        echo  "<script>alert('Edição realizada com sucesso!');</script>";

    } else {

        echo  "<script>alert('Não foi possível realizar a edição!);</script>";
        unset($_SESSION['editRegERRO']);
        }

    unset($_SESSION['editRegDone'] );
    


}
?>


<main class = 'main-item'>
    
    <div class = 'main-div-items'>
        
        
        
        <div class = 'lista'> 


           <div class = 'header-lista-items'>

            <a><h3> Suas turmas </h3> </a>



            </div>
        <?php foreach($turmas as $turma) {
            
            $data = explode('-',$turma->getData_ini());
            $dataenc = $turma->getData_enc();
            $enc = empty($dataenc) ? ' ': 'Encerrada';
            ?>
            <div class = 'item'>

                <span class = 'nome-item'> <?= 'Turma nº'.$turma->getCodigo().' '.$data[2].'/'.$data[1].'/'.$data[0].' '.$turma->getCodIdioma().' '.$turma->getCodNivel() ?> </span>
                <span style = 'color:crimson'> <?= $enc ?></span>

                <div class = 'opcoes'>
                    
                    <a href="historicoController.php?acao=verreg&cod=<?= $turma->getCodigo()?>"><span class = 'item-encerrar' onclick="deleteAluno('ingles')"> Ver Registros </span> </a>

                    <!--<a href=""><span class = 'item-visu' onclick="visuAluno('Leonardo')"> Visualizar </span> </a>  !-->

                </div>

            </div>
            <?php  } ?>

        </div>




    </div>

</main>


<script>

</script>


</body>