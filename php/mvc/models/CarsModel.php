<?php
class CarsModel extends Db
{
    function index()
    {
        return $this->newArray("cars");
    }
    
    function cars($n) {
        $ar = $this->newArray("cars" . $n);
        return $ar;
    }

    function carsjs() {
        $file = fopen('database/json/cars1.json', 'r') or die('error');
        $js = fread($file,filesize("database/json/cars1.json"));
        fclose($file);
        return $js;
    }

    function same($k, $v) {
        $ar = $this->newArray("cars1");
        return $this->filter($ar, $k, $v);
    }
    
    function detail($v) {
        $ar = $this->newArray('cars1');
        $ar1 = $this->filter($ar, 'name', $v);
        return $ar1[0];
    }
}
