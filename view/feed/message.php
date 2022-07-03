<?php

print '<hr><p>'.e($message['message'], false).'</p>';
$href='/messages/'.$message['id'];
print '<a href="'.$href.'">';
print '<small>'.date('r', $message['created_at']).'</small></a>';
