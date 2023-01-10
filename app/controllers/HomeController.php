<?php

namespace app\controllers;

use system\core\Controller;

class HomeController extends Controller
{
    public function index()
    {


        $this->template('home/home');
    }



}