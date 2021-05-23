<?php 

class Professor{

    private $email;
    private $nome_completo;
    private $usu_acesso;
    private $senha_acesso;
    private $permissao;
    private $codigo;
    private $telefone;
    private $status_ativ;
    


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
     * Get the value of permissao
     */ 
    public function getPermissao()
    {
        return $this->permissao;
    }

    /**
     * Set the value of permissao
     *
     * @return  self
     */ 
    public function setPermissao($permissao)
    {
        $this->permissao = $permissao;

        return $this;
    }

    /**
     * Get the value of senha_acesso
     */ 
    public function getSenha_acesso()
    {
        return $this->senha_acesso;
    }

    /**
     * Set the value of senha_acesso
     *
     * @return  self
     */ 
    public function setSenha_acesso($senha_acesso)
    {
        $this->senha_acesso = $senha_acesso;

        return $this;
    }

    /**
     * Get the value of usu_acesso
     */ 
    public function getUsu_acesso()
    {
        return $this->usu_acesso;
    }

    /**
     * Set the value of usu_acesso
     *
     * @return  self
     */ 
    public function setUsu_acesso($usu_acesso)
    {
        $this->usu_acesso = $usu_acesso;

        return $this;
    }

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
     * Get the value of status_ativ
     */ 
    public function getStatus_ativ()
    {
        return $this->status_ativ;
    }

    /**
     * Set the value of status_ativ
     *
     * @return  self
     */ 
    public function setStatus_ativ($status_ativ)
    {
        $this->status_ativ = $status_ativ;

        return $this;
    }
}


?>