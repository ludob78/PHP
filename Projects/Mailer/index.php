<?php
//Charger l'autoloader
require_once 'vendor/autoload.php';
//Charger nos configs
\Mailer\Services\FormFactory::$bootstrap=false;
//Instancier le Controller Principal
new \Mailer\Kernel\Controller();
?>