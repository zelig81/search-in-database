<?php
    namespace controller;
    use application\BaseController as BaseController;

    class SearchController extends BaseController {
        function index() {
            $this->registry->template->user = $_SESSION['user'];
            $this->registry->template->show('header_logoff');

            $chosenTable = htmlspecialchars($_POST['chosenTable']);
            $this->registry->template->chosenTable = $chosenTable;
            $this->registry->template->show('header_change_table');


        }
    }

?>
