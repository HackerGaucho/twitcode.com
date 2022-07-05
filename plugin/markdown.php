<?php


function markdown($str)
{// composer require erusev/parsedown
    $Parsedown = new Parsedown();
    $Parsedown->setSafeMode(true);
    return $Parsedown->text($str);
}
