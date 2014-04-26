<?php
    namespace controller;
    use application\BaseController as BaseController;
    class IndexController extends BaseController{
        function index(){
            if (ini_get('display_errors')) echo '<br> Got to IndexController';
            $this->registry->template->welcome = 'Welcome to Otkazniki search engine';
            $this->registry->template->show('index');
            
        }
    }

?>
