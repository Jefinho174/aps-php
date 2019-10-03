<?php
    namespace Entidades;
    
    spl_autoload_register(function($class){
        if(file_exists("$class.php")){
            require_once("$class.php");
            return true;
        }
    });
    
    class ReceitaIngrediente
    {
        private $idreceitas_ingredientes;
        private $id_receitas;
        private $id_ingredientes;
        private $ingrediente = null;
        private $quantidade;

        public function __construct() 
        { 
            $a = func_get_args(); 
            $i = func_num_args(); 
            if (method_exists($this,$f='__construct'.$i)) { 
                call_user_func_array(array($this,$f),$a); 
            } 
        } 

        function __construct3($id_receitas,$id_ingredientes,$quantidade){
            $this->id_receitas = $id_receitas;
            $this->id_ingredientes = $id_ingredientes;
            $this->quantidade = $quantidade;
            $this->ingrediente = null;
        }

        public function &__set($atrib, $value){
            $this->$atrib = $value;
        }
    
        public function setIngrediente($object){
            $this->ingrediente = $object;
        }

        public function &__get($atrib){
            return $this->$atrib;
        }


    }