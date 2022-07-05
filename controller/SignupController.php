<?php

namespace controller;

use controller\SigninController;
use model\UsersModel;

class SignupController
{
    public $error=[];
    public function post()
    {
        // validar o email
        $email=$_POST['email'];
        $email=$this->validEmail($email);

        // validar o nome
        $name=$_POST['name'];
        $name=$this->validName($name);

        // validar a senha
        $password=$_POST['password'];
        $password=$this->validPassword($password);

        if ($email and $name and $password) {
            // criar usuário
            $UsersController=new UsersController();
            $user=$UsersController->create($email, $name, $password);
            if ($user) {
                // enviar email de confirmação
                if ($this->sendConfirmationCode($user)) {
                    // logar
                    $SigninController=new SigninController();
                    $SigninController->usingEmailAndPassword($email, $password);
                } else {
                    $this->setError('smtpError');
                }
            } else {
                $this->setError('unknownError');
            }
        }
    }
    public function sendConfirmationCode($user)
    {
        $data=[
            'name'=>$user['name'],
            'code'=>$user['confirmation_code'],
            'id'=>$user['id']
        ];
        $body=view('email/confirmation', $data, false);
        $subject=__("Confirmação de email", false);
        $subject=html_entity_decode($subject);
        $to=$user['email'];
        $toName=$user['name'];
        return email($body, $subject, $to, $toName);
    }
    public function setError($error)
    {
        $this->error[]=$error;
    }
    public function validEmail($email)
    {
        $email=mb_strtolower(trim($email));
        $UsersModel=new UsersModel();
        $where=[
            'email'=>$email
        ];
        $emailExists=$UsersModel->read($where);
        $min=6;
        $max=64;
        $len=mb_strlen($email);
        $sizeOk=true;
        if ($len<$min or $len>$max) {
            $sizeOk=false;
        }
        if (
            filter_var($email, FILTER_VALIDATE_EMAIL) and
            !$emailExists and
            $sizeOk
        ) {
            return $email;
        } else {
            $this->setError('invalidEmail');
            return false;
        }
    }
    public function validName($name)
    {
        $arr=explode(' ', $name);
        $arr=array_map('trim', $arr);
        $arr=array_values($arr);
        $validName=implode(' ', $arr);
        // apenas caracteres imprimíveis
        foreach ($arr as $key=>$value) {
            if (!ctype_graph($value)) {
                $this->setError('invalidName');
                $validName=false;
                break;
            }
        }
        $min=2;
        $max=32;
        $len=mb_strlen($validName);
        if ($len<$min or $len>$max) {
            $validName=false;
        }
        return $validName;
    }
    public function validPassword($password)
    {
        $min=8;
        $max=256;
        $len=mb_strlen($password);
        if ($len>=$min and $len<=$max) {
            return $password;
        } else {
            $this->setError('invalidPassword');
            return false;
        }
    }
    public function __destruct()
    {
        if (count($this->error)>=1) {
            $data=[
                'error'=>$this->error
            ];
            view('error', $data);
        }
    }
}
