<?php

$title=SITE_NAME;
$data['title']=$title;
view('inc/header', $data);
view('form/signin');
view('form/signup');
