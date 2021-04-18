




<main class = 'main-item'>
    
    <div class = 'main-div-items'>
        
        
        
        <div class = 'lista'> 


           <div class = 'header-lista-items'>

            <a href="index.php?view=cad_turma"><h3> Clique aqui para cadastrar uma turma </h3> </a>



            </div>

            <div class = 'item'>

                <span class = 'nome-item'> Turma 1 Ingles avançado </span>

                <div class = 'opcoes'>

                    <a href="index.php?view=edit_turma"><span class = 'item-editar' onclick=""> Editar </span> </a>
                    <a href=""><span class = 'item-deletar' onclick="deleteAluno('ingles')"> Deletar </span> </a>
                    <!--<a href=""><span class = 'item-visu' onclick="visuAluno('Leonardo')"> Visualizar </span> </a>  !-->

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
        nomes = '';
        nome = 'leo'
        for (i = 0; i < 15; i = i + 1){

            nomes = nomes + "\n" + nome;

        }
        window.alert("Aluno: "+nomes+"? \n Muito lindo");

    }
</script>


</body>