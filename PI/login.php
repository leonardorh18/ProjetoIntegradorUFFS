


<!DOCTYPE html>
<?php 
session_start();
require_once 'classes/ProfessorDAO.php';



if (isset($_POST["login"] ) && isset($_POST['pass']) && isset($_POST['entrar'])){


    $profDAO = new ProfessorDAO();
    
    $prof = $profDAO->logar($_POST['pass'], $_POST['login']);
   // print_r($prof);
   
    if (count($prof) ==  1) {
        $prof = $prof[0];
        //print_r($prof);
        
        $_SESSION['loged'] = True;
        $_SESSION['user'] = serialize($prof);
		if(isset($_SESSION['logFail'])) {

			unset($_SESSION['logFail']);
		}
        header('Location: index.php');
        

    } else {
		$_SESSION['logFail'] = True;
        header('Location: login.php');
    }
    
    
}

?>

<html>
<link rel="stylesheet" type="text/css" href="css/login.css">

<body >

		<div id="login-div">
			<div class = 'login-form'>
                <h1>Sistema de controle</h1>
				<?php 
				if (isset($_SESSION['logFail'])){
				
				?>

				<span style='color:tomato'>Senha incorreta ou Usuário incorreto(s).</span>
				<?php } 
				?>
                <form action="login.php" method="POST">
                    <input type="text" id="user" class="form-input" name="login" placeholder="Usuário de login" required>
                    
                    <input type="password" id="password" class="form-input" name="pass" placeholder="Senha de usuário"  required>
                    
					<input type="submit" class="button-login" value="Entrar" name = 'entrar' >
					<br>
					
                </form>
                
			</div>



		</div>

<script>


</script>

<body>

</html>