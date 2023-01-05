<?php

class security extends tokenModel{
    public function createToken($idUser){
        return $this->create($idUser);
    }

    public function verificy(){
        $token = empty($_GET['token']) ? null : $_GET['token'];
        $tokenResult = $this->getToken($token);

        if ($tokenResult){
            if (date('Y-m-d H:i:s') > date('Y-m-d H:i:s',strtotime($tokenResult['created_exp']))){
                header('HTTP/1.1 401 Unauthorized');
                die;    
            }else {
                $userModel = new userModel();
                $user = $userModel->getById($tokenResult['idUser']);
                return $user;   
            }
        }else {
            header('HTTP/1.1 401 Unauthorized');
            die;
        }
    }
}