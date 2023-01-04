<?php

class userController{
    private $userModel;
    private $view;

    private $name;
    private $email;
    private $password;

    public function __construct(){
        $this->userModel = new userModel();
        $this->view = new view();

        $this->name = empty($_POST['name']) ? null : $_POST['name'];
        $this->email = empty($_POST['email']) ? null : $_POST['email'];
        $this->password = empty($_POST['password']) ? null : $_POST['password'];
    }

    public function create(){
        if (empty($this->name) || empty($this->email) || empty($this->password)) {
            $this->view->api(null, 'Preencha todos os campos', 400);
            return;
        }else{

            $idNovoUser = $this->userModel->create($this->name, $this->email, $this->password);

            if ($idNovoUser != false) {
                $novoUser = $this->userModel->getById($idNovoUser);
                $this->view->api($novoUser,'Usuário cadastrado com sucesso', 200);
            } else {
                $this->view->api(null, 'Erro ao cadastrar usuário', 400);
            }
        }
    }

    public function update(){
        if (empty($this->name) || empty($this->email) || empty($this->password)) {
            $this->view->api(null, 'Preencha todos os campos', 400);
            return;
        }else{
            $idUser = $_GET['id'];
            $update = $this->userModel->update($this->name, $this->email, $this->password, $idUser);

            if ($update > 0) {
                $user = $this->userModel->getById($idUser);
                $this->view->api($user, 'Usuário atualizado com sucesso', 200);
            } else {
                $this->view->api(null, 'Erro ao atualizar usuário', 400);
            }
        }
    }

    public function delete(){

    }

    public function getAll(){

    }

    public function getById(){

    }
}