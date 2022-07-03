<?php

class Articles
{
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
