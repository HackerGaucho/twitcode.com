<?php

namespace controller;

class ArticlesController
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
            view('article', $data);
        }
    }
    public function post()
    {
        $article=$_POST['article'];
        $message=[
            'message'=>$_POST['message'],
            'article'=>$article,
            'article_html'=>markdown($article),
            'created_at'=>time(),
            'type'=>'article'
        ];
        db()->insert('messages', $message);
        header('Location: /');
    }
}
