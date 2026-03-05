<?php

class BaseController
{
    public function model($model)
    {
        require_once APPROOT . '/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = [])
    {
        $path = APPROOT . '/views/' . $view . '.php';
        if (file_exists($path))
        {
            require_once($path);
        } else {
            echo 'View bestaat niet';
        }
    }
}