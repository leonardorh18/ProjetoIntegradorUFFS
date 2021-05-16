<?php 

class Registro {


    private $codTurma;
    private $obs;
    private $conteudo;
    private $data;
    private $codigo;

    /**
     * Get the value of codTurma
     */ 
    public function getCodTurma()
    {
        return $this->codTurma;
    }

    /**
     * Set the value of codTurma
     *
     * @return  self
     */ 
    public function setCodTurma($codTurma)
    {
        $this->codTurma = $codTurma;

        return $this;
    }

    /**
     * Get the value of obs
     */ 
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * Set the value of obs
     *
     * @return  self
     */ 
    public function setObs($obs)
    {
        $this->obs = $obs;

        return $this;
    }

    /**
     * Get the value of conteudo
     */ 
    public function getConteudo()
    {
        return $this->conteudo;
    }

    /**
     * Set the value of conteudo
     *
     * @return  self
     */ 
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;

        return $this;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of codigo
     */ 
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */ 
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function isPresent($aluno, $alunosT){

        foreach($alunosT as $a){

            if ($a == $aluno->getMatricula()){

                return True;

            }
        }

        return False;
             

    }
}
?>