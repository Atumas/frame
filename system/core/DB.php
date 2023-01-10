<?php

namespace system\core;


class DB
{
    private $conn;
    private $sql = '';


    public function __construct()
    {
        $this->conn = new \PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }

    public function select($columns)
    {
        $this->sql .= "SELECT " . $columns . " FROM ";
        return $this;
    }

    public function insert($table, $arr)
    {
        foreach ($arr as $key => $item) {

            if ($key == 'password') $arr[$key] = md5(trim($item));
            else $arr[$key] = htmlspecialchars(trim($item));

        }

        $this->sql .= "INSERT INTO " . $table . "(";

        foreach ($arr as $k => $v) {
            if (end($arr) == $v) $this->sql .= $k;
            else $this->sql .= $k . ",";
        }

        $this->sql .= ") VALUES ( ";

        foreach ($arr as $k => $v) {

            if (end($arr) == $v) $this->sql .= ":" . $k;
            else $this->sql .= ":" . $k . ",";
        }

        $this->sql .= ")";
        $res = $this->conn->prepare($this->sql);
        $res->execute($arr);
        $this->sql = '';

    }

    public function query($sql)
    {
        $res = $this->conn->query($sql);
        return $res->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function from($table)
    {
        $this->sql .= $table;
        return $this;
    }

    public function where($arr, $value = null)
    {
        $this->sql .= " WHERE ";

        if (is_array($arr)) {
            $last = end($arr);
            foreach ($arr as $field => $value) {
                if ($last == $value) {
                    $this->sql .= $field . " = '" . $value . "' ";
                } else {
                    $this->sql .= $field . " = '" . $value . "' AND ";
                }
            }
        } else {
            $this->sql .= $arr . " = '" . $value . "' ";
        }

        return $this;
    }

    public function get()
    {
        $res = $this->conn->query($this->sql);
        $this->sql = '';
        return $res->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function all($table, $limit = null, $offset = null)
    {
        $this->sql .= "SELECT * FROM " . $table;

        if ($limit != null) $this->sql .= " LIMIT " . $limit;
        if ($offset != null) $this->sql .= " OFFSET " . $offset;

        $res = $this->conn->query($this->sql);
        $this->sql = '';
        return $res->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function sql()
    {
        echo '<pre>';
        echo $this->sql;
        echo '</pre>';
    }

}