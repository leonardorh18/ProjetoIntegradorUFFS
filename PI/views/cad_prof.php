


<?php 

if (isset($_SESSION['cadprofsenha'])){

    if($_SESSION['cadprofsenha']){

       echo  "<script>alert('Senha precisa ter no minimo 6 digitos');</script>";

    } 

    unset($_SESSION['cadprofsenha']);


}



?>


    <div class = 'main-div-cad-item'>


<form action = 'professorController.php?acao=cadastrar' method="POST">
    <h3 style = 'margin-bottom: 20px; color: rgb(19, 132, 167)'>Cadastro de conta</h3>

    <label for="nomeCompleto"> Nome completo</label>
    <input type="text" id="nomeCompleto" class="form-input" name="nomeCompleto" placeholder="Nome completo" required>
    
    <label for="matricula"> Email </label>
    <input type="email" id="email" class="form-input" name="email" placeholder="Email" required>
    
    <label for="matricula"> Telefone </label>
    <input type="text" id="tel" class="form-input" name="tel" placeholder="Telefone" required>

    <label for="senha"> Senha de acesso </label>
    <input type="text" id="senha" class="form-input" name="senha" placeholder="Senha de acesso" required>

    <label for="user"> Usuario </label>
    <input type="text" id="user" class="form-input" name="user" placeholder="Usuario de acesso" required>

    <label for="perm"> SELECIONE A PERMISSÃO DE ACESSO </label>
    <br>
    <div class="select" style="width:200px;">
    <select class="select-css" name = 'perm'>
            

            <option value="1"> Permissao de adm</option>
            <option value="2"> Permissao de professor</option>
          
 
    </select>
    </div>
    <br>
    

    
    <input type="submit" class="button-cad" value="Cadastrar" name ='cadprof'  onclick="logIn()">
    <br>
    
</form>
</div>






</body>