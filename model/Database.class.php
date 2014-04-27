<?php
    namespace model;
    class Database {
        private $root;
        private $password;

        public function __construct() {
            if (ini_get('display_errors')) echo '<br>Database::__construct run';
            $xml = simplexml_load_file(__DIR__ . '/../settings/settings.xml');
            $this->root = $xml->user;
            $this->password = $xml->password;
        }
        public function getTableNames() {
            if (ini_get('display_errors')) echo '<br>Database::getTableNames run';

            $this->tableNames = array('one', 'two', 'three');
            return $this->tableNames;
            
        }

        
    }
?>
