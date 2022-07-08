<?php

namespace controller;

use model\SearchModel;

class SearchController
{
    public function get()
    {
        $SearchModel=new SearchModel();
        $q=$_GET['q'];
        $messages=$SearchModel->buscar($q);
        $data=[
            'isAuth'=>isAuth(),
            'messages'=>$messages
        ];
        view('search', $data);
    }
}
