<?php

class HashSet
{
    public $table;

    /*
    * HashMap构造函数
    */
    public function __construct()
    {
        $this->table = array();
    }

    public function put($value)
    {
        if (in_array($value, $this->table)) {
            return false;
        } else {
            $this->table[] = $value;
            return true;
        }
    }

    public function remove($value)
    {
        if (in_array($value, $this->table)) {
            $key = array_search($value, $this->table);
            unset($this->table[$key]);
        }
        return true;
    }

    public function values()
    {
        return $this->table;
    }

    public function removeAll()
    {
        $this->table = null;
        $this->table = array();
    }

    public function containsValue($value)
    {
        return in_array($value, $this->table);
    }


    public function size()
    {
        return count($this->table);
    }


    /*
     * 判断HashMap是否为空
     */
    public function isEmpty()
    {
        return (count($this->table) == 0);
    }

    /**
     *
     */
    public function toString()
    {
        print_r($this->table);
    }
}