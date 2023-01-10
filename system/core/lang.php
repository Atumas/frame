<?php

$lang = $_POST['lang'];

setcookie('lang',$lang,time()+60*60*24*365*10,'/');


