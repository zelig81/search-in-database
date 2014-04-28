<?php
    namespace application;
    use model\CheckAccess as CheckAccess;
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
            if (!empty($_POST['user'])) {
                if (ini_get('display_errors')) echo '<br>Router got not empty variable [user]:' . $_POST['user'];
                $_SESSION['access'] = CheckAccess::run($_POST['user'],$_POST['password']);
                
            }
            if(!isset($_SESSION['access'])) {
                if (ini_get('display_errors')) echo '<br>Router: access is not set'; 
                $this->controller = 'Index';
                $this->action = 'login';
            }
            elseif ($_SESSION['access'] == 'access denied') {
                if (ini_get('display_errors')) echo '<br>Router: access is set to "access denied"'; 
                $this->controller = 'Index';
                $this->action = 'loginAfterWrongCredentials';
            }
            else{
                if(empty($_POST['rt']) === true){
                    if (ini_get('display_errors')) echo '<br>Router: variable [rt] is not set - redirection to IndexController->index action'; 
                    $this->controller = 'Index';
                    $this->action = 'index';
                }
                else {
                    if (ini_get('display_errors')) echo '<br>Router: variable [rt] is set - redirection to ' . $_POST['rt'] . 'Controller'; 
                    $this->controller = $_POST['rt'];
                    if(isset($_POST['action']) === true){
                        if (ini_get('display_errors')) echo '<br>Router: variable [rt] is set - redirection to ' . $_POST['rt'] . 'Controller with '. $_POST['action'] . ' action'; 
                        $this->action = $_POST['action'];
                    }
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
            $class = 'controller\\' . $this->controller . 'Controller';
            if (ini_get('display_errors')) echo '<br>Router: try to load ' . $class;
            $controller = new $class($this->registry);

            if(is_callable(array($controller, $this->action)) === false){
                $action = 'index';
            }
            else{
                $action = $this->action;
            }
            if (ini_get('display_errors')) echo '<br>Router: with this action: ' . $action;
            $controller->$action();

        }
    }
?>
