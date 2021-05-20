<?php 

class Anotacao{

    private $descri;
    private $codProfessor;
    private $codTurma;
    private $prior;
    private $codigo;



    /**
     * Get the value of descri
     */ 
    public function getDescri()
    {
        return $this->descri;
    }

    /**
     * Set the value of descri
     *
     * @return  self
     */ 
    public function setDescri($descri)
    {
        $this->descri = $descri;

        return $this;
    }

    /**
     * Get the value of codProfessor
     */ 
    public function getCodProfessor()
    {
        return $this->codProfessor;
    }

    /**
     * Set the value of codProfessor
     *
     * @return  self
     */ 
    public function setCodProfessor($codProfessor)
    {
        $this->codProfessor = $codProfessor;

        return $this;
    }

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

    /**
     * Get the value of prior
     */ 
    public function getPrior()
    {
        return $this->prior;
    }

    /**
     * Set the value of prior
     *
     * @return  self
     */ 
    public function setPrior($prior)
    {
        $this->prior = $prior;

        return $this;
    }
}

?>