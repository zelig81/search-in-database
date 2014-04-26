<?php
    namespace application;
    class Router {
        private $registry;
        private $controllerPath;
        private $args = array();
        public $file;
        public $controller;
        public $action;

        function __construct($registry){
            $this->registry = $registry;
        }

        function setPath($controllerPath){
            if (ini_get('display_errors')) echo '<br>Router: get to Router::setPath';
            if(is_dir($controllerPath) === false){
                die('Invalid controller path `' . $controllerPath . '`');
            }
            $this->controllerPath = $controllerPath;
        }

        private function getController(){
            if($this->registry->checkAccess == null){
                $this->controller = 'Index';
                $this->action = 'index';
            }
            elseif($this->registry->checkAccess === 'read'){
                $route = (empty($_POST['rt'])) ? '' : $_POST['rt'];
                if(empty($route) === true){
                    $route = 'index';
                }
                else {
                    $parts = explode('/', $route);
                    $this->controller = $parts[0];
                    if(isset($parts[1]) === true){
                        $this->action = $parts[1];
                    }
                }

                if(empty($this->controller) === true){
                    $this->controller = 'Index';
                }

                if(empty($this->action) === true){
                    $this->action = 'index';
                }
            }
            
            $this->file = $this->controllerPath . '/' . $this->controller . 'Controller.class.php';

        }

        public function loader(){
            /*** get controller from request ***/
            $this->getController();
            if(is_readable($this->file) === false){
                if (ini_get('display_errors')) echo '<br>Router: ' . $this->file . ' is not readeable';
                die('404 not found');
            }
            if (ini_get('display_errors')) echo '<br>router: try to load ' .$this->controller;
            $class = 'controller\\' . $this->controller . 'Controller';
            $controller = new $class($this->registry);

            if(is_callable(array($controller, $this->action)) === false){
                $action = 'index';
            }
            else{
                $action = $this->action;
            }
            $controller->$action();

        }
    }
?>
