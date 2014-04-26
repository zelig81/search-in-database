<?php
    /*** nullify any existing autoloads ***/
    spl_autoload_register(null,false);

    /*** specify extensions may be loaded ***/
    spl_autoload_extensions('.class.php');

    function classLoader($class_name){
        $filename = $class_name . '.class.php';
        $file = __SITE_PATH . '/' . $filename;
        if (ini_get('display_errors')) echo '<br>init classLoader: Try to load class: ' . $file;
        if(file_exists($file) === false){
            if (ini_get('display_errors')) echo '<br>init classLoader: file is not exist';
            return false;
        }
        include ($file);
    }

    spl_autoload_register('classLoader');
    
    $registry = new application\Registry();
    
    
?>