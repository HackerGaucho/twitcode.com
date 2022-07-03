<?php

class Home
{
    public function get()
    {
        $where=[
            'ORDER'=>['created_at'=>'DESC']
        ];
        $messages=db()->select('messages', '*', $where);
        $data=[
            'messages'=>$messages
        ];
        view("home", $data);
    }
}
