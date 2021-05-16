
<div class = 'main-div-cad-item'>


<form class = 'cad-turma' method="POST" action="turmaController.php?acao=concluiedit">

<div>
            <?php 
            
            $obs = empty($reg->getObs()) ? 'Vazio' : $reg->getObs();
            $data = explode('-', $reg->getData());

            ?>

            <span> <?= 'Registro: '.$reg->getCodigo()?></span>
            <br>
            <span> <?= 'Conteudo: '.$reg->getConteudo()?></span>
            <br>
            <span> <?= 'Obs: '.$obs?></span>
            <br>
            <span> <?= 'Data: '.$data[2].'/'.$data[1].'/'.$data[0]?></span>
            <br>

      
        <h3 style = 'margin-bottom: 20px; color: rgb(19, 132, 167); margin-top: 10px'>Alunos</h3>
        <?php foreach($alunos as $aluno) { ?>

                        <br>
                        <span style = 'color: rgb(40, 132, 167);'>
                        <?= $aluno->getNome_completo() ?>
                        </span>
                        <br>

                        <?= $aluno->getStatus_pres() == 1 ? '<span style = "color: #129808"> Presente </span>': '<span style = "color: #CD2929"> Ausente </span>'?>
               
                        <br>
                        <span>
                        <?= 'Matricula: '.$aluno->getmatricula() ?>
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

                        <br>

                    
                
        <?php }?>

</div>

</form>
</div>






</body>