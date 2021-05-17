


<?php 

if (isset($_SESSION['editprofsenha'])){

    if($_SESSION['editprofsenha']){

       echo  "<script>alert('Senha precisa ter no minimo 6 digitos');</script>";

    } 

    unset($_SESSION['editprofsenha']);


}



?>


    <div class = 'main-div-cad-item'>


<form action = 'professorController.php?acao=concluiredit' method="POST">
    <h3 style = 'margin-bottom: 20px; color: rgb(19, 132, 167)'>Edição do professor</h3>

    <label for="nomeCompleto"> Nome completo</label>
    <input type="text" value = "<?= $prof->getNome_completo()?>" id="nomeCompleto" class="form-input" name="nomeCompleto" placeholder="Nome completo do professor" required>
    
    <label for="matricula"> Email </label>
    <input type="email" value="<?= $prof->getEmail() ?>" id="email" class="form-input" name="email" placeholder="Email" required>
    
    <label for="matricula"> Telefone </label>
    <input type="text" value = "<?= $prof->getTelefone() ?>" id="tel" class="form-input" name="tel" placeholder="Telefone" required>

    <label for="senha"> Senha de acesso </label>
    <input type="text" value = "<?= $prof->getSenha_acesso()?>"id="senha" class="form-input" name="senha" placeholder="Senha de acesso" required>

    <label for="user"> Usuario </label>
    <input type="text"  value = "<?= $prof->getUsu_acesso()?>"id="user" class="form-input" name="user" placeholder="Usuario de acesso" required>

    <label for="perm"> SELECIONE A PERMISSÃO DE ACESSO </label>
    <br>
    <div class="select" style="width:200px;">
    <?php 
    $perm = $prof->getPermissao() == 1? 'Permissao de adm' : 'Permissao de professor';
    ?>
    <select class="select-css" name = 'perm'>
            
            <option value = "<?= $prof->getPermissao()?>"> <?= $perm ?> </option>
            <option value="1"> Permissao de adm</option>
            <option value="2"> Permissao de professor</option>
          
 
    </select>
    </div>
    <br>
    

    
    <input type="submit" class="button-cad" value="Editar" name ='editprof' >
    <br>
    
</form>
</div>






</body>