<?php
use model\UsersModel;

function logout($url='/')
{
    $tokenExpiration=$_GET['tokenExpiration'];
    $where['id']=@$_COOKIE['userId'];
    $where['token']=@$_COOKIE['userToken'];
    $where['token_expiration']=$tokenExpiration;
    $where=['AND'=>$where];
    $UsersModel=new UsersModel();
    $cols=[
        'id',
        'token_expiration'
    ];
    $user=$UsersModel->read($where, $cols);
    if ($user['token_expiration']==$tokenExpiration) {
        $expiration=1;
        setcookie(
            "userId",
            null,
            $expiration
        );
        setcookie(
            "userToken",
            null,
            $expiration
        );
    }
    redirect($url);
}