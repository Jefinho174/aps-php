<?php
    namespace Entidades;
    
    spl_autoload_register(function($class){
        if(file_exists("$class.php")){
            require_once("$class.php");
            return true;
        }
    });
    
    class Receita
    {
        private $idreceitas;
        private $nome;
        private $preparo;
        private $ingredientes = [];

        public function __construct() 
        { 
            $a = func_get_args(); 
            $i = func_num_args(); 
            if (method_exists($this,$f='__construct'.$i)) { 
                call_user_func_array(array($this,$f),$a); 
            } 
        } 

        function __construct2($nome,$preparo){
            $this->nome = $nome;
            $this->preparo = $preparo;
            $this->ingredientes = array();
        }
        
        public function &__set($atrib, $value){
            $this->$atrib = $value;
        }
    
        public function &__get($atrib){
            return $this->$atrib;
        }

    }