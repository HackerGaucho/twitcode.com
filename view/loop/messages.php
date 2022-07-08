<?php

if ($messages) {
    foreach ($messages as $message) {
        view('feed/'.$message['type'], ['message'=>$message]);
    }
}
