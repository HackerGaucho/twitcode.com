<?php

$title=SITE_NAME;
$data=[
    'title'=>$title
];
view('inc/header', $data);
print '<h1>'.$title.'</h1>';
view('form/message');
view('form/article');
if ($messages) {
    foreach ($messages as $message) {
        view('feed/'.$message['type'], ['message'=>$message]);
    }
}
