<?php

function markdown($str)
{
    $Parsedown = new Parsedown();
    $Parsedown->setSafeMode(true);
    return $Parsedown->text($str);
}
