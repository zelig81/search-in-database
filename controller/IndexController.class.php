<?php
    namespace controller;
    use application\BaseController as BaseController;
    use model\Database as Database;

    class IndexController extends BaseController{
        function index(){
            if (ini_get('display_errors')) echo '<br>IndexController: constructing choosing_table page';
            $this->registry->template->welcome = 'Welcome to Otkazniki search engine';
            $db = new Database();
            $this->registry->template->tableNames = $db->getTableNames();
            $this->registry->template->access = $_SESSION['access'];
            $this->registry->template->show('choosing_table');
            
        }

        function login(){
            if (ini_get('display_errors')) echo '<br>IndexController: constructing login page';
            $this->registry->template->message = '<p>Welcome to Otkazniki search engine. Please enter your user and password:</p>';
            $this->registry->template->show('login');
        }

        function loginAfterWrongCredentials(){
            if (ini_get('display_errors')) echo '<br>IndexController: constructing login page after unsuccessful try';
            $this->registry->template->message = '<p style="color:red">Wrong user or password. Please try again</p>';
            $this->registry->template->show('login');
        }
    }

?>
