<?php

namespace app\controllers;

use system\core\Controller;

class Page3Controller extends Controller
{
    public function index(){

        $data['name_page'] = 'Page 3';


        $this->template('page3', $data);
    }
}