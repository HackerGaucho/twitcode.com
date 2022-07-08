<?php

namespace controller;

class HomeController
{
    public function get()
    {
        $data=[
            'isAuth'=>isAuth()
        ];
        view("home", $data);
    }
}
