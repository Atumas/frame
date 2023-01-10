<?php

namespace app\controllers;

use system\core\Controller;

class Page2Controller extends Controller
{
    public function index(){

        $data['name_page'] = 'Page 2';


        $this->template('page2', $data);
    }
}