<?php

$title=SITE_NAME;
$data=[
    'title'=>$title
];
view('inc/head', $data);
print '<h1>'.$title.'</h1>';
view('form/signup');