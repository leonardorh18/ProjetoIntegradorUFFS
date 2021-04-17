




<main class = 'main-alunos'>
    
    <div class = 'main-div-alunos'>
        
        
        
        <div class = 'lista-aluno'> 


           <div class = 'header-lista-alunos'>

            <a href="index.php?view=cad_aluno"><h3> Clique aqui para cadastrar um aluno </h3> </a>

            <div class = 'procura-aluno'>

                <form action="">
                    
                    <input type="text" id="searchAluno" class="input-search-aluno" name="searchAluno" placeholder="Nome do aluno" required>

                    <input type="button" class="button-search-aluno" value="Procurar"  >

                </form>
                

            </div>

            </div>

            <div class = 'aluno'>

                <span class = 'nome-aluno'> Ana Clara </span>

                <div class = 'opcoes'>

                    <a href="index.php?view=edit_aluno"><span class = 'aluno-editar' onclick=""> Editar </span> </a>
                    <a href=""><span class = 'aluno-deletar' onclick="deleteAluno('Leonardo')"> Deletar </span> </a>
                    <a href=""><span class = 'aluno-visu' onclick="visuAluno('Leonardo')"> Visualizar </span> </a>

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