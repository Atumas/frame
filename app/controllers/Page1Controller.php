<?php

namespace app\controllers;

use system\core\Controller;

class Page1Controller extends Controller
{
    public function index(){

        $data['name_page'] = 'Page 1';


        $this->template('page1', $data);
    }
}