<?php

$rout = new \system\core\Router();



$rout->set('/', '\app\controllers\HomeController','index');
$rout->set('page1', '\app\controllers\Page1Controller','index');
$rout->set('page2', '\app\controllers\Page2Controller','index');
$rout->set('page3', '\app\controllers\Page3Controller','index');



$rout->run();
//$rout->get_routs();