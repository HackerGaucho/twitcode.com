<?php

class Articles
{
    public function post()
    {
        $message=[
            'message'=>$_POST['message'],
            'article'=>$_POST['article'],
            'created_at'=>time(),
            'type'=>'article'
        ];
        db()->insert('messages', $message);
        header('Location: /');
    }
}
