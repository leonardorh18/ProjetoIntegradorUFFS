
<div class = 'main-div-cad-item'>


<form class = 'cad-turma' method="POST" action="turmaController.php?acao=concluiedit">
<?php 


$dtini = explode('-', $turma->getData_ini());
$dtini = $dtini[2].'/'.$dtini[1].'/'.$dtini[0];

if (!empty($turma->getData_enc())){

    $dtenc = explode('-',  $turma->getData_enc());
    $dtenc = $dtenc[2].'/'.$dtenc[1].'/'.$dtenc[0];

} else {

    $dtenc = 'Em andamento';

}


?>
<div>
        <h2 style = 'margin-bottom: 20px; color: rgb(19, 132, 167)'>Detalhes da Turma</h2>
        <span> <?= 'Professor: '.$prof->getNome_completo()?></span>
        <br>
        <span> <?= 'Email: '.$prof->getEmail()?></span>
        <br>
        <span> <?= 'Telefone: '.$prof->getTelefone()?></span>

        <br>
        <span> <?= 'Data de inicio: '.$dtini?></span>
        <br>
        <span> <?= 'Data de encerramento: '.$dtenc?></span>
        <br>
        <?php foreach($horario as $hor) {?>

            <span> <?= 'Dia: '.$hor['dia'].', hora: '.$hor['horario']?></span>
            <br>

        <?php } ?>
        <h3 style = 'margin-bottom: 20px; color: rgb(19, 132, 167); margin-top: 10px'>Alunos</h3>
        <?php foreach($alunos as $aluno) { ?>

                        <br>
                        <span style = 'color: rgb(40, 132, 167);'>
                        <?= $aluno->getNome_completo() ?>
                        </span>
                        <br>
                        <span>
                        <?= 'Telefone: '.$aluno->getTelefone() ?>
                        </span>
                        <br>
                        <span>
                        <?= 'Email: '.$aluno->getEmail() ?>
                        </span>
                        <br>
                        <span>
                        <?= 'Matricula: '.$aluno->getmatricula() ?>
                        <span  style = 'color: red '><?= $aluno->getStatus_mat() == 0 ?'Inativo' : 'Ativo'?></span>
                        </span>
                        <br>
                    
                
        <?php }?>

</div>

</form>
</div>






</body>