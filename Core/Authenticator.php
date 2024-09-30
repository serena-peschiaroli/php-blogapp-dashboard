<?php

namespace Core;

class Authenticator{

    public function attempt($email, $password){
        $user = App::resolve(Database::class)
        ->query('select * from authors where email = :email', [
            'email' => $email
        ])->find();

        if($user){
            if(password_verify($password, $user['password'])){
                $this->login([
                    'id' => $user['id'],
                    'email' => $user['email']
                ]);

                return true;
            }

        }
        return false;
    }


    public function login($user){
        $_SESSION['user'] = [
            'id'=>$user['id'],
            'email' => $user['email']
        ];

        session_regenerate_id(true);

    }


    public function logout(){
        Session::destroy();
    }
}