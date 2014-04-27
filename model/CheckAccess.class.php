<?php
    namespace model;
    class CheckAccess {
        public static function run($user, $password){
            $return_value = 'access denied';
            if (ini_get('display_errors')){
                echo '<br>model/CheckAccess: got user/password: ' . $user . '/' . $password;
                if ($user == 'error')
                    $return_value = 'access denied';
                else
                    $return_value = 'read';
                echo '<br>model/CheckAccess: return value: ' . $return_value;
            }
            return $return_value;
        }
    }
?>
