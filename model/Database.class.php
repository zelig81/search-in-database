<?php
    namespace model;
    class Database {
        public function getTableNames() {
            if (ini_get('display_errors')) echo '<br>Database::getTableNames run';
            $xml = simplexml_load_file(__DIR__ . '/../settings/settings.xml');
            $root = $xml->user;
            $password = $xml->password;
            $con = mysqli_connect("localhost", $root, $password, "otkazniki") or die('Could not connect to database');
            $result = mysqli_query($con, "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE='BASE TABLE' and TABLE_SCHEMA = 'otkazniki'");
            $tableNames = array();
            while ($row = mysqli_fetch_array($result)){
                $tableNames[] = $row[0];
            }
            return $tableNames;
            mysqli_close($con);
        }

        
    }
?>
