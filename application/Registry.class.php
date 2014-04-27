<?php
    namespace application;
    class Registry {
        private $vars = array();
        
        public function __set($index, $value){
            $this->vars[$index] = $value;
        }

        public function __get($index){
            return $this->vars[$index];
        }

        public function __isset($index){
            return array_key_exists($index, $this->vars);
            
        }
    }
?>
