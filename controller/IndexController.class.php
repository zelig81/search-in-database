<?php
    namespace controller;
    use application\BaseController as BaseController;
    class IndexController extends BaseController{
        function index(){
            if (ini_get('display_errors')) echo '<br>IndexController: constructing index page';
            $this->registry->template->welcome = 'Welcome to Otkazniki search engine';
            $this->registry->template->show('index');
            
        }

        function login(){
            if (ini_get('display_errors')) echo '<br>IndexController: constructing login page';
            $this->registry->template->message = '<p>Welcome to Otkazniki search engine. Please enter your user and password:</p>';
            $this->registry->template->show('login');
        }

        function loginAfterWrongCredentials(){
            if (ini_get('display_errors')) echo '<br>IndexController: constructing login page after unsuccessful try';
            $this->registry->template->message = '<p color="red">Wrong user or password. Please try again</p>';
            $this->registry->template->show('login');
        }
    }

?>
