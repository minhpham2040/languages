<?php
class Home extends Controller
{
    function index()
    {
        session_start();
        $carsModel = $this->model('CarsModel');
        $fruitsModel = $this->model('FruitsModel');
        $motoModel = $this->model('MotoModel');
        $js = $carsModel->carsjs();
        $this->view('master1', [
            'page' => 'home/index',
            'cars1' => $carsModel->cars(1),
            'carsjs' => json_decode($js, true),
            'fruits' => $fruitsModel->fruits(),
            'moto' => $motoModel->moto()
        ]);
    }

    function cars($v)
    {
        session_start();
        $carsModel = $this->model('CarsModel');
        $commentModel = $this->model('CommentModel');
        $car = $carsModel->detail($v);
        $comment = $commentModel->same($v);
        $strCar = "";
        foreach ($car as $v) {
            $strCar .= $v . "$";
        };
        $strCar = chop($strCar, "$");
        $strCar = trim($strCar);
        $this->view('master1', [
            'page' => 'home/cars/detail',
            'url' => ['home', 'cars'],
            'car' => $car,
            'str' => $strCar,
            'comment' => $comment
        ]);
    }

    function fruits()
    {
        $fruitsModel = $this->model('FruitsModel');
        $this->view('master', [
            'page' => 'fruits',
            'fruits' => $fruitsModel->same()
        ]);
    }
}
