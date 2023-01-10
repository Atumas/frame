<?php

namespace system\core;

class Router
{
    private $url;
    private $param_1;
    private $bez_param_1;
    private array $routs = [];
    private array $routs_1 = [];


    public function __construct()
    {
        $this->url = key($_GET) ?? '/';
    }

    public function set($rout, $controller, $method)
    {

        if (strripos($rout, '/(1)')) {
            $this->param_1 = explode('/', $this->url);
            $this->param_1 = $this->param_1[count($this->param_1) - 1];

            $this->bez_param_1 = explode('/', $this->url);
            array_pop($this->bez_param_1);
            $this->bez_param_1 = implode('/', $this->bez_param_1);
            $rout = str_replace('/(1)', '', $rout);;
            $this->routs_1[$rout] = [$controller => $method];
        } else {
            $this->routs[$rout] = [$controller => $method];
        }
    }

    public function run()
    {
        if (array_key_exists($this->url, $this->routs)) {

            foreach ($this->routs[$this->url] as $controller => $method) {
                $new = new $controller();
                $new->$method();
            }

        } elseif (array_key_exists($this->bez_param_1, $this->routs_1)) {

            foreach ($this->routs_1[$this->bez_param_1] as $controller => $method) {
                $new = new $controller();
                $new->$method($this->param_1);

            }


        } else {
            require 'app/views/404.php';
        }
    }

    public function get_routs()
    {
        echo '<pre>';

        print_r($this->routs);
        print_r($this->routs1);
        print_r($this->routs2);
    }
}