<?php

$title=SITE_NAME;
$data['title']=$title;
view('inc/header', $data);
print '<hr>';
view('form/message');
view('form/article');
view('loop/messages', ['messages'=>$messages]);