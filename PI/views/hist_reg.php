

<?php 

if (isset( $_SESSION['deleteReg'])){
    if ( $_SESSION['deleteReg']){

        echo  "<script>alert('Registro deletado!');</script>";

    } else {

        echo  "<script>alert('Nao foi possivel deletar o registro!');</script>";

    }
    unset( $_SESSION['deleteReg']);
}
if (isset($_SESSION['regDone'] )){


    if ($_SESSION['regDone'] ){

        
        echo  "<script>alert('Registro cadastrado com sucesso!');</script>";

    } else {

        echo  "<script>alert('Não foi possivel concluir o registro!');</script>";
        
    }
    unset($_SESSION['regDone'] );
}
?>


<main class = 'main-item'>
    
    <div class = 'main-div-items'>
        
        
        
        <div class = 'lista'> 


           <div class = 'header-lista-items'>

            <a><h3> Registros </h3> </a>



            </div>
        <?php foreach($regs as $reg) {
            $data = explode('-', $reg->getData());
            ?>
            <div class = 'item'>

                <span class = 'nome-item'> <?= 'Registro nº'.$reg->getCodigo().' do dia '.$data[2].' mês '.$data[1].' ano '.$data[0]?> </span>

                <div class = 'opcoes'>
                    
                    <a href="historicoController.php?acao=detreg&cod=<?= $reg->getCodigo()?>"><span class = 'item-visu' > Detalhes </span> </a>
                    <a href="historicoController.php?acao=editreg&cod=<?= $reg->getCodigo()?>&codT=<?= $_GET['cod'] ?>" ><span class = 'item-edit'  > Editar </span> </a>
                    <a href="historicoController.php?acao=delreg&cod=<?= $reg->getCodigo()?>&codT=<?= $_GET['cod']?>"><span class = 'item-encerrar' onclick="return confirm('Tem certeza que deseja deletar este registro?')"> Deletar </span> </a>

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