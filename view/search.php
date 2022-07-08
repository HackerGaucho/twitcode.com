<?php

$title=__('Resultados da pesquisa', false);
$data=[
    'title'=>$title
];
view('inc/header', $data);
print '<h1>'.$title.'</h1>';
view('loop/messages', ['messages'=>$messages]);
