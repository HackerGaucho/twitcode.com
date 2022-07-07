<?php

use model\UsersModel;

function isAuth()
{
    $where['id']=@$_COOKIE['userId'];
    $where['token']=@$_COOKIE['userToken'];
    $where=['AND'=>$where];
    $UsersModel=new UsersModel();
    $cols=[
        'id',
        'name',
        'username',
        'token_expiration'
    ];
    $user=$UsersModel->read($where, $cols);
    if ($user) {
        return $user;
    } else {
        return false;
    }
}
