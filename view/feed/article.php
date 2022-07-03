<?php

$href='/articles/'.$message['id'];
print '<hr><p><b>';
print '<a href="'.$href.'">';
e($message['message']);
print '</a></b></p>';
print '<a href="'.$href.'">';
print '<small>'.date('r', $message['created_at']).'</small></a>';
