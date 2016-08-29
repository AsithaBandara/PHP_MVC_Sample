<?php

class ManagerJobController extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        if ($logged == false && $role != 'manager') {
            Session::destroy();
            header('location: login');
            exit();
        }

        //$this->view->js = array();
    }

    public function index() {

        $this->view->render('ManagerJob/index');
    }

    public function edit($id) {
        $managerjob = new ManagerJobModel();
        $jobslist = $managerjob->listJob($id);
        $this->view->customer = $this->model->listCustomer($jobslist['customer_id']);
        $this->view->job = $this->model->listJob($id);
        $this->view->render('ManagerJob/edit');
    }

    public function editSave($id) {
        if (isset($_POST)) {
            $data = array();
            $data['status'] = $_POST['status'];
            $data['id'] = $id;

            $rowcount = $this->model->editSave($data);

            if ($rowcount) {
                $this->view->JobList = $this->model->JobList();
                $this->view->render('ManagerJob');
            } else {
                header('location: ' . URL . 'ManagerJob');
            }
        }
    }

}
