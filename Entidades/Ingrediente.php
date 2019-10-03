<?php
    namespace Entidades;
    
    spl_autoload_register(function($class){
        if(file_exists("$class.php")){
            require_once("$class.php");
            return true;
        }
    });
    
    class Ingrediente
    {
        private $idingredientes;
        private $nome;
        private $descricao;
        private $unidade;
        private $estoque;

        public function __construct() 
        { 
            $a = func_get_args(); 
            $i = func_num_args(); 
            if (method_exists($this,$f='__construct'.$i)) { 
                call_user_func_array(array($this,$f),$a); 
            } 
        } 

        function __construct4($nome,$descricao,$unidade,$quantidade){
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->unidade = $unidade;
            $this->estoque = $quantidade;
        }

        public function &__set($atrib, $value){
            $this->$atrib = $value;
        }
    
        public function &__get($atrib){
            return $this->$atrib;
        }
    }

    