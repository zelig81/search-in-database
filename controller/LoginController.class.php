<?php
    namespace controller;
    use application\BaseController as BaseController;
    class LoginController extends BaseController{
        function index(){
            if (ini_get('display_errors')) echo '<br> Got to LoginController';
            $this->registry->template->show('login');
            
        }
    }

?>
