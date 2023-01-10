<?php

namespace app\models;

class Product
{

    public function getAllProducts(){

        echo 'Model';
    }
    public function getProducts($id){

        echo 'get_products '.$id;
    }
}