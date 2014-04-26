<?php
    namespace application;
    class Template {
        private $registry;
        private $vars = array();

        function __construct($registry){
            $this->registry = $registry;
            if (ini_get('display_errors')) echo '<br>Template initialized';
        }

        public function __set($index,$value){
            $this->vars[$index] = $value;
        }

        function show($name){
            $path = __SITE_PATH . '/view/' . $name . '.php';
            if (ini_get('display_errors')) echo '<br>Template: Try to load ' . $path;
            
            if(file_exists($path) === false){
                die('Template ' . $name . ' was not found in path: ' . $path);
            }
            if (ini_get('display_errors')) echo '<br>Template: file ' . $path . ' was found';
            foreach($this->vars as $key => $value){
                $$key = $value;
            }

            include($path);
        }

    }
?>
