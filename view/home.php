<?php

$title=SITE_NAME;
$data=[
    'title'=>$title
];
view('inc/header', $data);
print '<h1>'.$title.'</h1>';
view('form/signin');
view('form/signup');
