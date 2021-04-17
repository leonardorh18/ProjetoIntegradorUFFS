<!DOCTYPE html>

<html>
<link rel="stylesheet" type="text/css" href="css/login.css">

<body >

		<div id="login-div">
			<div class = 'login-form'>
                <h1>Sistema de controle</h1>
                <form>
                    <input type="email" id="email" class="form-input" name="login" placeholder="Usuário de login" required>
                    
                    <input type="password" id="password" class="form-input" name="login" placeholder="Senha de usuário"  required>
                    
					<input type="button" class="button-login" value="Entrar"  onclick="logIn()">
					<br>
					
                </form>
                
			</div>



		</div>

<script>

    function logIn(){

        window.location = 'index.php?views=inicio'; 

}
</script>

<body>

</html>