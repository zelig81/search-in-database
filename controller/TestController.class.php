<?php
    namespace controller;
    use application\BaseController as BaseController;
    class TestController extends BaseController{
        function index(){
            if (ini_get('display_errors')) echo '<br> Got to TestController';
            $this->registry->template->welcome = 'test page';
            $this->registry->template->show('test');
            
        }
    }

?>
