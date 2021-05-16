<?php 


class Turma{

    private $data_enc;
    private $codigo;
    private $data_ini;
    private $codNivel;
    private $codIdioma;
    private $codProf;
    



    /**
     * Get the value of nome
     */ 

    /**
     * Get the value of data_enc
     */ 
    public function getData_enc()
    {
        return $this->data_enc;
    }

    /**
     * Set the value of data_enc
     *
     * @return  self
     */ 
    public function setData_enc($data_enc)
    {
        $this->data_enc = $data_enc;

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
     * Get the value of data_ini
     */ 
    public function getData_ini()
    {
        return $this->data_ini;
    }

    /**
     * Set the value of data_ini
     *
     * @return  self
     */ 
    public function setData_ini($data_ini)
    {
        $this->data_ini = $data_ini;

        return $this;
    }

    /**
     * Get the value of codNivel
     */ 
    public function getCodNivel()
    {
        return $this->codNivel;
    }

    /**
     * Set the value of codNivel
     *
     * @return  self
     */ 
    public function setCodNivel($codNivel)
    {
        $this->codNivel = $codNivel;

        return $this;
    }

    /**
     * Get the value of codIdioma
     */ 
    public function getCodIdioma()
    {
        return $this->codIdioma;
    }

    /**
     * Set the value of codIdioma
     *
     * @return  self
     */ 
    public function setCodIdioma($codIdioma)
    {
        $this->codIdioma = $codIdioma;

        return $this;
    }

    /**
     * Get the value of codProf
     */ 
    public function getCodProf()
    {
        return $this->codProf;
    }

    /**
     * Set the value of codProf
     *
     * @return  self
     */ 
    public function setCodProf($codProf)
    {
        $this->codProf = $codProf;

        return $this;
    }
}

?>