<?php

namespace controller;

use controller\SigninController;

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
        $email=trim($email);
        $email=mb_strtolower($email);
        return $email;
    }
    public function validName($name)
    {
        $name=trim($name);
        return $name;
    }
    public function validPassword($password)
    {
        return $password;
    }
}
