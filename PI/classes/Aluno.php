<?php

class Aluno {

    private $nome_completo;
    private $email;
    private $telefone;
    private $matricula;
    private $status_mat;
    private $status_pres;

    /**
     * Get the value of nome_completo
     */ 
    public function getNome_completo()
    {
        return $this->nome_completo;
    }

    /**
     * Set the value of nome_completo
     *
     * @return  self
     */ 
    public function setNome_completo($nome_completo)
    {
        $this->nome_completo = $nome_completo;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of telefone
     */ 
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @return  self
     */ 
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of matricula
     */ 
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set the value of matricula
     *
     * @return  self
     */ 
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get the value of status_mat
     */ 
    public function getStatus_mat()
    {
        return $this->status_mat;
    }

    /**
     * Set the value of status_mat
     *
     * @return  self
     */ 
    public function setStatus_mat($status_mat)
    {
        $this->status_mat = $status_mat;

        return $this;
    }

    /**
     * Get the value of status_pres
     */ 
    public function getStatus_pres()
    {
        return $this->status_pres;
    }

    /**
     * Set the value of status_pres
     *
     * @return  self
     */ 
    public function setStatus_pres($status_pres)
    {
        $this->status_pres = $status_pres;

        return $this;
    }
}
?>