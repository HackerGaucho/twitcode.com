<?php

function random($tamanho=11)
{
    $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-';
    $randomStr = '';
    for ($i = 0; $i < $tamanho; $i++) {
        $randomStr .= $str[rand(0, mb_strlen($str)-1)];
    }
    return $randomStr;
}
