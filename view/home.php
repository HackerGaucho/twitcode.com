<?php

$title=SITE_NAME;
$data['title']=$title;
view('inc/header', $data);
?>
<main>
    <article>
        <?php
    view('form/signin');
view('form/signup');
?>
    </article>
</main>
