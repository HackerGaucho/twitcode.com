<?php

namespace controller;

use model\UsersModel;

class SigninController
{
    public $error=[];
    public function post()
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $this->usingEmailAndPassword($email, $password);
    }
    public function usingEmailAndPassword($email, $password, $url='')
    {
        $UsersModel=new UsersModel();
        $email=mb_strtolower(trim($email));
        $where=[
            'email'=>$email
        ];
        $user=$UsersModel->read($where);
        $passwordOk=false;
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $passwordOk=true;
            } else {
                $passwordOk=false;
                $this->setError('invalidPassword');
            }
        } else {
            $this->setError('invalidEmail');
        }
        if (count($this->error)==0) {
            $token=random();
            $segundosPorDia=24*60*60;
            $segundosPorAno=365*$segundosPorDia;
            $segundosEmQuatroAnos=4*$segundosPorAno;
            $tokenExpiration=time()+$segundosEmQuatroAnos;
            $data=[
                'token'=>$token,
                'token_expiration'=>$tokenExpiration
            ];
            $where=[
                'id'=>$user['id']
            ];
            $UsersModel->update($data, $where);
            if (
                setcookie('userId', $user['id'], $tokenExpiration) and
                setcookie('userToken', $token, $tokenExpiration)
            ) {
                if (empty($url)) {
                    $url=SITE_URL.'/users/'.$user['id'];
                }
                header('Location: '.$url);
            } else {
                $this->setError('unknownError');
            }
        } else {
            $data=[
                'error'=>$this->error
            ];
            view('error', $data);
        }
    }
    public function setError($error)
    {
        $this->error[]=$error;
    }
}
