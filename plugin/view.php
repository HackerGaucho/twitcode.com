<?php

function view($name, $data=[], $print=true)
{
    $filename=realpath(__DIR__.'/../view/'.$name.'.php');
    if (file_exists($filename)) {
        $data['data']=$data;
        extract($data);
        if ($print) {
            require $filename;
        } else {
            ob_start();
            require $filename;
            $output=ob_get_contents();
            ob_end_clean();
            return $output;
        }
    } else {
        $str='view <b>'.$name.'</b> not found';
        die($str);
    }
}
