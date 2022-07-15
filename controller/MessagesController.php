<?php

namespace controller;

class MessagesController
{
    public function get()
    {
        $messageId=segment(2);
        $where=[
            'id'=>$messageId
        ];
        $message=db()->get('messages', '*', $where);
        if ($message) {
            $data=[
                'isAuth'=>isAuth(),
                'message'=>$message
            ];
            view('messages', $data);
        }
    }
    public function post()
    {
        $message=[
            'message'=>$_POST['message'],
            'created_at'=>time(),
            'type'=>'message'
        ];
        db()->insert('messages', $message);
        header('Location: /');
    }
}
