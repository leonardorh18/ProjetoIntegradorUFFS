






<aside id="menu-lateral">

	<div class="conteudo-lateral">	
    <span id="showMenu" onclick="showMenu()">&equiv; Menu</span>
        <nav id="menu">

            <ul>
                
                <li><a href="index.php?view=cadastros">Cadastros</a> </li>
                
                <li> <a href="controleTurmaController.php">Controle de turma</a> </li>
                
                <li> <a href="index.php?view=pedido">Anotações</a> </li>
                
                <li><a href="historicoController.php">Históricos</a> </li>
               
                <li><a href="professorController.php">Configuração de contas</a> </li>
                
                <li> <a href="index.php?view=logout"><h1> SAIR </h1></a>  </li>
                

    
            </ul>

            
        </nav>

        

	</div>
</aside>
<script>
    document.body.onresize = function(){
    largura = window.innerWidth;
    menu = document.getElementById("menu");
    if(largura >=700){
        console.log("Asdasd")
        menu.style.display = 'block';
    }
    else{
        menu.style.display = 'none';
    }

};

function showMenu(){
    console.log("asdadsad");
    menu = document.getElementsByTagName("nav")[0];
    if(menu.style.display == 'block')
      menu.style.display = 'none';
    else
      menu.style.display = 'block';
}

</script>

<body>

