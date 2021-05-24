
<?php

if (isset($_SESSION['camposAlunoEdit'])){

    echo  "<script>alert('Complete todos os campos!');</script>";
    unset($_SESSION['camposAlunoEdit']);


}


?>




<div class = 'main-div-cad-item'>


<form action ='alunoController.php?acao=concluiedit' method = 'POST'>
    <h3 style = 'margin-bottom: 20px; color: rgb(19, 132, 167)'>Edição do aluno</h3>
    
    <label for="nomeCompleto"> Nome completo</label>
    <input type="text" id="nomeCompleto" class="form-input" name="nomeCompleto" value = '<?= $aluno->getNome_completo()?>' placeholder="Nome completo do aluno" required>
    
    <label for="matricula"> Email </label>
    <input type="email" id="email" class="form-input" name="email" placeholder="Email" value = '<?= $aluno->getEmail()?>' required>
    
    <label for="matricula"> Telefone </label>
    <input type="text" id="tel" class="form-input" name="tel" placeholder="Telefone" value = '<?= $aluno->getTelefone() ?>' required>

    <label for="matricula"> Matricula </label>
    <input type="text" id="matricula" class="form-input" name="matricula" placeholder="Matricula do Aluno"  value = '<?= $aluno->getMatricula() ?>' required>
    

    <input type="submit" class="button-cad" value="Concluir edições" name = 'edit' >
    <br>
    
</form>
</div>






</body>