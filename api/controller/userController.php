<?php

class userController{
    private $userModel;
    private $view;

    private $name;
    private $email;
    private $password;

    //Construtor da classe userController que instancia a classe userModel e a classe view e recebe os dados do usuário
    public function __construct(){
        $this->userModel = new userModel();
        $this->view = new view();

        $this->name = empty($_POST['name']) ? null : $_POST['name'];
        $this->email = empty($_POST['email']) ? null : $_POST['email'];
        $this->password = empty($_POST['password']) ? null : $_POST['password'];
    }

    //Função para inserir um usuário
    public function create(){
        if (empty($this->name) || empty($this->email) || empty($this->password)) {
            $this->view->api(null, 'Preencha todos os campos', 400);
            return;
        }else{

            $idNovoUser = $this->userModel->create($this->name, $this->email, $this->password);

            if ($idNovoUser != false) {
                $newUser = $this->userModel->getById($idNovoUser);
                $this->view->api($newUser,'Usuário cadastrado com sucesso', 200);
            } else {
                $this->view->api(null, 'Erro ao cadastrar usuário', 400);
            }
        }
    }

    //Função para atualizar os dados do usuário
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

    //Função para deletar um usuário
    public function delete(){
        $idUser = $_GET['id'];
        $delete = $this->userModel->delete($idUser);

        if ($delete > 0) {
            $this->view->api(null, 'Usuário deletado com sucesso', 200);
        } else {
            $this->view->api(null, 'Erro ao deletar usuário', 400);
        }
    }

    //Função para listar todos os usuários cadastrados
    public function getAll(){
        $getall = $this->userModel->getAll();

        if ($getall != false) {
            $this->view->api($getall, 'Usuários encontrados', 200);
        } else {
            $this->view->api(null, 'Nenhum usuário encontrado', 400);
        }
    }

    //Função para listar um usuário específico
    public function getById(){
        $idUser = $_GET['id'];
        $getById = $this->userModel->getById($idUser);

        if ($getById != false) {
            $this->view->api($getById, 'Usuário encontrado', 200);
        } else {
            $this->view->api(null, 'Usuário não encontrado', 400);
        }
    }
}