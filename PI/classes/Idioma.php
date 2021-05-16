<?php

class Idioma{

    private $codigo;
    private $descri;

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
}

?>
