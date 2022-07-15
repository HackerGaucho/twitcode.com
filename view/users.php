<?php

$title=SITE_NAME;
$data['title']=$title;
view('inc/header', $data);
?>
<hr>
<main>
    <article>
        <?php
view('form/message');
view('form/article');
?>
    </article>
    <article>
        <?php
view('loop/messages', ['messages'=>$messages]);
?>
    </article>
</main>
