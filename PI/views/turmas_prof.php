




<main class = 'main-item'>
    
    <div class = 'main-div-items'>
        
        
        
        <div class = 'lista'> 


           <div class = 'header-lista-items'>

            <a><h3> Suas turmas </h3> </a>



            </div>

            <div class = 'item'>

                <span class = 'nome-item'> Turma 1 Ingles avançado </span>

                <div class = 'opcoes'>
                    
                    <a href=""><span class = 'item-encerrar' onclick="deleteAluno('ingles')"> Encerrar turma </span> </a>
                    <a href=""><span class = 'item-alunos' onclick=""> Alunos</span> </a>
                    <a href="index.php?view=reg_aula"><span class = 'item-registro' > Registro de aula</span> </a>
                    <!--<a href=""><span class = 'item-visu' onclick="visuAluno('Leonardo')"> Visualizar </span> </a>  !-->

                </div>

            </div>

        </div>




    </div>

</main>


<script>
    function deleteAluno(nome){

        if (confirm("Você realmente quer encerrar "+nome+"?")){

            window.alert("Encerrando "+nome);
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