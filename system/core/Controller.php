<?php

namespace system\core;



class Controller
{
    public $db;

    public function __construct()
    {
        $this->db = new DB();

        foreach (scandir('app/helpers') as $dir){
            if ($dir == '.' || $dir == '..') continue;
            require 'app/helpers/'.$dir;
        }

        $this->lang();
    }

    public function template($path,$data=[]){


        extract($data, EXTR_PREFIX_SAME,"wddx");

        require 'app/views/inc/head.php';
        require 'app/views/inc/header.php';
        echo "<section class='body'>";
        require 'app/views/inc/left_bar.php';
        require 'app/views/'.$path.'.php';
        echo "</section>";
        require 'app/views/inc/footer.php';

    }
    public function view($path,$data=[]){
        extract($data, EXTR_PREFIX_SAME,"wddx");
        require 'app/views/'.$path.'.php';

    }

    public function model($path){

        $path = '\app\models\\'.$path;
        return new $path();

    }

    public function lang(){

        if (!isset($_COOKIE['lang'])) setcookie('lang',DEFAULT_LANG,time()+60*60*24*365*10,'/');

    }

}