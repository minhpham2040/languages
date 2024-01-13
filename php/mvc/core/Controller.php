<?php
class Controller
{
    function model($model)
    {
        require_once "./mvc/models/" . $model . ".php";
        return new $model();
    }

    function view($view, $data = [])
    {
        include_once "./mvc/views/layouts/" . $view . ".php";
    }
}
