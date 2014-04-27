<?php
    namespace application;
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php
            /*** error reporting ***/
            error_reporting(E_ALL);
            ini_set('display_errors', 'On');


            /*** define site path variable ***/
            $site_path = realpath(dirname(__FILE__));
            define('__SITE_PATH',$site_path);
    
            include 'includes/init.php';
            $registry->router = new Router($registry);
            $registry->router->setPath(__SITE_PATH . '\controller');
            $registry->template = new Template($registry);
            $registry->router->loader();


        ?>
    </body>

</html>
