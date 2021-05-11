<?php
    class Conexao{
        // atributo
        public static $conexao;

        // método
        private $bdName;
        public function __construct(){
            $this->setBdName('pi');
        }

        public static function conecta(){
            if(!isset(self::$conexao)){
                try{
                    self::$conexao = new PDO("mysql:host=localhost; dbname=pi", "adm", "12345");
                }
                catch(PDOException $e){
                    echo "Erro de conexão: ". $e->getMessage();
                    die();
                }
            }
            return self::$conexao;
        }

        /**
         * Get the value of bdName
         */ 
        public function getBdName()
        {
                return $this->bdName;
        }

        /**
         * Set the value of bdName
         *
         * @return  self
         */ 
        public function setBdName($bdName)
        {
                $this->bdName = $bdName;

                return $this;
        }
    }

?>   