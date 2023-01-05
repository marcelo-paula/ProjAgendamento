<?php

class companyController {
    private $companyModel;
    private $view;

    private $name;
    private $layout;
    private $logo;
    private $idUser;

    public function __construct() {
        $this->companyModel = new companyModel();
        $this->view = new view();

        $this->name = empty($_POST['name']) ? null : $_POST['name'];
        $this->layout = empty($_POST['layout']) ? null : $_POST['layout'];
        $this->logo = empty($_POST['logo']) ? null : $_POST['logo'];
    }

    public function create() {
        if (empty($this->name) || empty($this->layout) || empty($this->logo)) {
            $this->view->api(null, 'Preencha todos os campos', 400);
            return;
        } else {
            $idNewCompany = $this->companyModel->create($this->name, $this->layout, $this->logo, $this->idUser);

            if ($idNewCompany != false) {
                $newCompany = $this->companyModel->getById($idNewCompany);
                $this->view->api($newCompany, 'Empresa cadastrada com sucesso', 200);
            } else {
                $this->view->api(null, 'Erro ao cadastrar empresa', 400);
            }
        }
    }

    public function update(){
        if (empty($this->name) || empty($this->layout) || empty($this->logo)) {
            $this->view->api(null, 'Preencha todos os campos', 400);
            return;
        } else {
            $idCompany = $_GET['id'];
            $update = $this->companyModel->update($this->name, $this->layout, $this->logo, $this->idUser, $idCompany);

            if ($update) {
                $company = $this->companyModel->getById($idCompany);
                $this->view->api($company, 'Empresa atualizada com sucesso', 200);
            } else {
                $this->view->api(null, 'Erro ao atualizar empresa', 400);
            }
        }
    }

    public function delete(){
        $idCompany = $_GET['id'];
        $delete = $this->companyModel->delete($idCompany);

        if ($delete) {
            $this->view->api(null, 'Empresa deletada com sucesso', 200);
        } else {
            $this->view->api(null, 'Erro ao deletar empresa', 400);
        }
    }

    public function getAll(){
        $companies = $this->companyModel->getAll();

        if ($companies) {
            $this->view->api($companies, 'Empresas listadas com sucesso', 200);
        } else {
            $this->view->api(null, 'Erro ao listar empresas', 400);
        }
    }

    public function getById(){
        $idCompany = $_GET['id'];
        $company = $this->companyModel->getById($idCompany);

        if ($company) {
            $this->view->api($company, 'Empresa listada com sucesso', 200);
        } else {
            $this->view->api(null, 'Erro ao listar empresa', 400);
        }
    }
}