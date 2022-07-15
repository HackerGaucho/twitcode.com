<?php

namespace controller;

class UsersController
{
    public function create($email, $name, $password)
    {
        $user=[
            'name'=>$name,
            'email'=>$email,
            'password'=>password_hash($password, PASSWORD_DEFAULT),
            'status'=>'unconfirmed',
            'created_at'=>time(),
            'confirmation_code'=>random()
        ];
        $db=db();
        $db->insert('users', $user);
        $userId=$db->id();
        if (is_numeric($userId)) {
            $user['id']=$userId;
            return $user;
        } else {
            return false;
        }
    }
    public function get()
    {
        $where=[
            'ORDER'=>['created_at'=>'DESC']
        ];
        $messages=db()->select('messages', '*', $where);
        $data=[
            'isAuth'=>isAuth(),
            'messages'=>$messages
        ];
        view("users", $data);
    }
}
