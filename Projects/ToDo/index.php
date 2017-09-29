<?php
//Charger l'autoloader
require_once 'vendor/autoload.php';
//Charger nos configs
\toDo\Services\FormFactory::$bootstrap=true;
\toDo\Services\Validator::$password_length=9;
if ($_SERVER['SERVER_ADDR']=="127.0.0.1"){
    \toDo\Kernel\DB::$db_name="todo_db";
    \toDo\Kernel\DB::$db_login="root";
    \toDo\Kernel\DB::$db_password="root";
    \toDo\Kernel\DB::$db_host="localhost";
}
elseif ($_SERVER['SERVER_ADDR']=="192.168.0.24"){
    \toDo\Kernel\DB::$db_name="todo_db";
    \toDo\Kernel\DB::$db_login="root";
    \toDo\Kernel\DB::$db_password="";
    \toDo\Kernel\DB::$db_host="tambar78";
}
//Instancier le Controller Principal
new \toDo\Kernel\Controller();
?>