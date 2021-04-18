




<main class = 'main-item'>
    
    <div class = 'main-div-items'>
        
        
        
        <div class = 'lista'> 


           <div class = 'header-lista-items'>

            <a href="index.php?view=cad_aluno"><h3> Clique aqui para cadastrar um aluno </h3> </a>

            <div class = 'procura-item'>

                <form action="">
                    
                    <input type="text" id="searchAluno" class="input-search-item" name="searchAluno" placeholder="Nome do aluno" required>

                    <input type="button" class="button-search-item" value="Procurar"  >

                </form>
                

            </div>

            </div>

            <div class = 'item'>

                <span class = 'nome-item'> Ana Clara </span>

                <div class = 'opcoes'>

                    <a href="index.php?view=edit_aluno"><span class = 'item-editar' onclick=""> Editar </span> </a>
                    <a href=""><span class = 'item-deletar' onclick="deleteAluno('Leonardo')"> Deletar </span> </a>
                    <a href=""><span class = 'item-visu' onclick="visuAluno('Leonardo')"> Visualizar </span> </a>

                </div>

            </div>

        </div>




    </div>

</main>


<script>
    function deleteAluno(nome){

        if (confirm("Você realmente que excluir "+nome+"?")){

            window.alert("Excluindo "+nome);
        }
    }

    function visuAluno(nome){

        window.alert("Aluno: "+nome+"? \n Muito lindo");

    }
</script>


</body>