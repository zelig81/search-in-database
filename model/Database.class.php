<?php
    namespace model;
    class Database {
        private $root;
        private $password;

        private function getCredentials() {
            $xml = simplexml_load_file(__DIR__ . '/../settings/settings.xml');
            $this->root = $xml->user;
            $this->password = $xml->password;
            
        }
        function getTableNames() {
            if (ini_get('display_errors')) echo '<br>Database::getTableNames run';
            getCredentials();
            $con = mysqli_connect("localhost", $this->root, $this->password, "otkazniki") or die('Could not connect to database');
            $result = mysqli_query($con, "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE='BASE TABLE' and TABLE_SCHEMA = 'otkazniki'");
            $tableNames = array();
            while ($row = mysqli_fetch_array($result)){
                $tableNames[] = $row[0];
            }
            return $tableNames;
            mysqli_close($con);
        }

        function getColumnsNames($table) {
            if (ini_get('display_errors')) echo '<br>Database::getColumnsNames run';
            getCredentials();
            $con = mysqli_connect("localhost", $this->root, $this->password, "otkazniki") or die('Could not connect to database');
            $result = mysqli_query($con, "SELECT column_names FROM information_schema.columns WHERE table_schema = 'otkazniki' AND " .
                                            "table_name = '" . $table . "';");
            $return_value = array();
            foreach(mysqli_fetch_array($result) as $row)
                $return_value[] = $row[0];
            return $return_value;

        }

        function search($dbName, $table, $arrColumns, $arrValues, $strictness) {
            if (ini_get('display_errors')) echo '<br>Database::search run';
            getCredentials();
            $begin = "SELECT `";
            $middle = "FROM `" . $dbName . "`.`" . $table . "`";
            $number_columns = count($arrColumns);
            $need_of_where = true;
            $need_of_comma_middle = false;
            $nonstrict_beg = "` LIKE '%";
            $nonstrict_end = "%'";
            $beg = '';
            $end = '';
            for ($i = 0; $i < $number_columns; $i++) {
                $comma = ($i < $number_columns - 1) ? "`, " : "` ";
                $begin .= $arrColumns[$i] . $comma;
                if ($arrValues[$i] != ''){
                    if ($need_of_where == true){
                        $need_of_where = false;
                        $middle .= 'WHERE ';
                    }
                    
                    if ($need_of_comma_middle == false){
                        $need_of_comma_middle = true;
                        $middle .= " `"; 
                    }
                    else {
                        $middle .= " AND `";
                    }

                    $beg = ($strictness) ? "` = '" : "` LIKE '%";
                    $end = ($strictness) ? "'" : "%'";
                    $middle .= $arrColumns[$i] . $beg . $arrValues[$i] . $end;

                }
            }
            $sql = $begin . $middle . ';';
            if (ini_get('display_errors')) echo '<br>Database::search sql query:"' . $sql . '"';

            
        }
    }
?>
