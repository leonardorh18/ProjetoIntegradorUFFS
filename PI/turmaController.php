
<?php
if (!isset($_GET['acao'])){
    include "views/layout/header.php";
    include "views/layout/menu.php";
    require_once 'classes/TurmaDAO.php';
    $turmaDAO = new TurmaDAO();
    $turmas = $turmaDAO->listar();
    include "views/turmas.php";
    include "views/layout/footer.php";
}else{

    switch($_GET['acao']){


        case 'cadastrar':
            require_once 'classes/IdiomaDAO.php';
            require_once 'classes/NivelDAO.php';
            require_once 'classes/ProfessorDAO.php';
            require_once 'classes/DiaDAO.php';

            if (isset($_POST['addaluno'])){

                if (isset($_POST['idioma']) && isset($_POST['dtini'])  && isset($_POST['nivel']) && isset($_POST['professor']) && isset($_POST['diasem'])){

                    $diasem = $_POST['diasem'];
                    $codhor = [];
                    $emp = False;
                    foreach($diasem as $dia){
                        $coddia = explode('-', $dia);
                        $hordia = $coddia[1];
                        $cod = $coddia[0];
                        $hordia = 'hor'.$hordia;
                        //echo $hordia;
                        if (isset($_POST[$hordia])){

                            if (empty($_POST[$hordia])) {

                                session_start();
                                $_SESSION['camposCadTurma'] = True;
                                
                                $emp = True;
                            }

                            
                            array_push($codhor, $cod , $_POST[$hordia]);
                            

                        } else {

                            session_start();
                            $_SESSION['camposCadTurma'] = True;
                            header("Location: turmaController.php?acao=cadastrar");
                        };
                    }
                    //print_r($codhor);

                    if ($emp){

                        header("Location: turmaController.php?acao=cadastrar");

                    } else {

                        session_start();
                        $_SESSION['codhor'] = serialize( $codhor);
                        $_SESSION['prof'] = $_POST['professor'];
                        $_SESSION['nivel'] = $_POST['nivel'];
                        $_SESSION['idioma'] = $_POST['idioma'];
                        $_SESSION['dtini'] = $_POST['dtini'];
                        header("Location: turmaController.php?acao=addaluno");

                    }



                } else {

                    session_start();
                    $_SESSION['camposCadTurma'] = True;
                    header("Location: turmaController.php?acao=cadastrar");
                }

            } else {
                include "views/layout/header.php";
                include "views/layout/menu.php";

                $idiomaDAO = new IdiomaDAO();
                $nivelDAO = new NivelDAO();
                $professorDAO = new ProfessorDAO();
                $diaDAO = new DiaDAO();

                $niveis = $nivelDAO->listar();
                $idiomas = $idiomaDAO->listar();
                $professores = $professorDAO->listar();
                $dias = $diaDAO->listar();

                include "views/cad_turma.php";
                include "views/layout/footer.php";

            }

        break;

        case 'addaluno':
        require_once 'classes/AlunoDAO.php';
        require_once 'classes/TurmaDAO.php';
   
        include "views/layout/header.php";
        include "views/layout/menu.php";

        if (isset($_POST['addalunos']) && isset($_POST['alunos'])){

            $alunosCheck = $_POST['alunos'];
            //print_r($alunosCheck);
            $turmaDAO = new TurmaDAO();
            //session_start();
            $codhor = unserialize($_SESSION['codhor']);
            $done = $turmaDAO->cadastra($codhor, $_SESSION['prof'], $_SESSION['nivel'], $_SESSION['idioma'], $_SESSION['dtini'], $alunosCheck);
            if ($done){

                $_SESSION['turmaCad'] = True;
                header("Location: turmaController.php");

            } else {

                $_SESSION['turmaCad'] = False;
                header("Location: turmaController.php?acao=addaluno");
            }


        } else {

            $alunoDAO = new AlunoDAO(); 
            $alunos = $alunoDAO->listar();
            include "views/cad_turma_alunos.php";
            include "views/layout/footer.php";

        }

        break;

        case 'excluir':
            require_once 'classes/ProfessorDAO.php';
            require_once 'classes/TurmaDAO.php';
            session_start();
            if (isset($_SESSION['user']) && isset($_GET['cod'])){

                $user = unserialize($_SESSION['user']);

                if ($user->getPermissao() == 1) {

                    $TurmaDAO = new TurmaDAO();
                    $TurmaDAO->delete($_GET['cod']);

                    header("Location: turmaController.php");
                    
                } else {
                    echo 'nao tem permissao';
                    header("Location: turmaController.php");
                }



            } else {
                echo 'nao tem acesso' ;
                
            }

        break;

        
        case 'editar':
            require_once 'classes/ProfessorDAO.php';
            require_once 'classes/TurmaDAO.php';
            require_once 'classes/IdiomaDAO.php';
            require_once 'classes/NivelDAO.php';
            require_once 'classes/DiaDAO.php';
            require_once 'classes/AlunoDAO.php';

            if(isset($_POST['editaluno'])){
                
                if (isset($_POST['idioma']) && isset($_POST['dtini'])  && isset($_POST['nivel']) && isset($_POST['professor']) && isset($_POST['diasem'])){

                    $diasem = $_POST['diasem'];
                    $codhor = [];
                    $emp = False;
                    foreach($diasem as $dia){
                        $coddia = explode('-', $dia);
                        $hordia = $coddia[1];
                        $cod = $coddia[0];
                        $hordia = 'hor'.$hordia;
                        //echo $hordia;
                        if (isset($_POST[$hordia])){

                            if (empty($_POST[$hordia])) {

                                session_start();
                                $_SESSION['camposCadTurma'] = True;
                                
                                $emp = True;
                            }

                            
                            array_push($codhor, $cod , $_POST[$hordia]);
                            

                        } else {

                            session_start();
                            $_SESSION['camposEditTurma'] = True;
                            header("Location: turmaController.php?acao=editar");
                        };
                    }
                    //print_r($codhor);

                    if ($emp){
                        $_SESSION['camposEditTurma'] = True;
                        header("Location: turmaController.php?acao=editar");

                    } else {

                        include "views/layout/header.php";
                        $_SESSION['codhor'] = serialize( $codhor);
                        $_SESSION['prof'] = $_POST['professor'];
                        $_SESSION['nivel'] = $_POST['nivel'];
                        $_SESSION['idioma'] = $_POST['idioma'];
                        $_SESSION['dtini'] = $_POST['dtini'];

            
                        $turmaDAO = new TurmaDAO();
                        
                        $alunosTurma = $turmaDAO->buscarAlunos($_SESSION['codEditTurma']);

                        $alunoDAO = new AlunoDAO(); 
                        $alunos = $alunoDAO->listar();

                        
                        include "views/layout/menu.php";
                        include "views/edit_turma_alunos.php";
                        include "views/layout/footer.php";
                        

                    }
                } else {
                    session_start();
                    $_SESSION['camposEditTurma'] = True;
                    header("Location: turmaController.php?acao=editar");

                }

            }   else if (isset($_GET['cod'])){

                include "views/layout/header.php";
                $_SESSION['codEditTurma'] = $_GET['cod'];
                $turmaDAO = new TurmaDAO();
                $turma = $turmaDAO->buscar($_GET['cod']);
                
                $idiomaDAO = new IdiomaDAO();
                $nivelDAO = new NivelDAO();
                $professorDAO = new ProfessorDAO();
                $diaDAO = new DiaDAO();

                $niveis = $nivelDAO->listar();
                $idiomas = $idiomaDAO->listar();
                $professores = $professorDAO->listar();
                $dias = $diaDAO->listar();

                foreach($idiomas as $idioma){

                    if ($idioma->getCodigo() == $turma->getCodIdioma()){

                        $sameIdioma = $idioma->getDescri();
                    }
                }

                foreach($niveis as $nivel){

                    if ($nivel->getCodigo() == $turma->getCodNivel()){

                        $sameNivel = $nivel->getDescri();
                    }
                }

                foreach($professores as $prof){

                    if ($prof->getCodigo() == $turma->getCodProf()){

                        $sameProf= $prof->getNome_completo();
                    }
                }


                
                include "views/layout/menu.php";
                include "views/edit_turma.php";
                include "views/layout/footer.php";


            } else {
                session_start();
                header("Location: turmaController.php?acao=editar&cod=".$_SESSION['codEditTurma']);
                
            }

        break;
        case 'concluiedit':
            require_once 'classes/AlunoDAO.php';
            require_once 'classes/TurmaDAO.php';
       
            include "views/layout/header.php";
            include "views/layout/menu.php";
    
            if (isset($_POST['addalunos']) && isset($_POST['alunos'])){
    
                $alunosCheck = $_POST['alunos'];
                //print_r($alunosCheck);
                $turmaDAO = new TurmaDAO();
                //session_start();
                $codhor = unserialize($_SESSION['codhor']);
                $done = $turmaDAO->editTurma($codhor, $_SESSION['codEditTurma'],$_SESSION['prof'], $_SESSION['nivel'], $_SESSION['idioma'], $_SESSION['dtini'], $alunosCheck);
                if ($done){
    
                    $_SESSION['turmaEdit'] = True;
                    header("Location: turmaController.php");
    
                } else {
    
                    $_SESSION['turmaEdit'] = False;
                    header("Location: turmaController.php");
                }
    
    
            } else {
    
                $alunoDAO = new AlunoDAO(); 
                $alunos = $alunoDAO->listar();
                include "views/cad_turma_alunos.php";
                include "views/layout/footer.php";
    
            }
    
            break;

            case 'exibir':
                require_once 'classes/TurmaDAO.php';

                if (isset($_GET['cod'])){

                    $turmaDAO = new TurmaDAO();
                    $horario = $turmaDAO->buscarHorario($_GET['cod']);
                    $alunos = $turmaDAO->buscarAlunos($_GET['cod']);
                    $prof = $turmaDAO->buscarProf($_GET['cod']);
                    include "views/layout/header.php";
                    include "views/layout/menu.php";
                    include "views/visu_turma.php";
                    include "views/layout/footer.php";
    

                } else {

                    header("Location: turmaController.php");

                }
            break;
    }
}

?>