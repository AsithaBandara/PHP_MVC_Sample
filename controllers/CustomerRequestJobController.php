<?php

class CustomerRequestJobController extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        if ($logged == false && role != 'customer') {
            Session::destroy();
            header('location: login');
            exit();
        }

        //$this->view->js = array();
    }

    public function index() {
        $this->view->JobList = $this->model->JobList();
        $this->view->PendingJobList = $this->model->PendingJobList();
        $this->view->AcceptedJobList = $this->model->AcceptedJobList();
        $this->view->RejectedJobList = $this->model->RejectedJobList();
        $this->view->render('CustomerRequestJob/index');
    }
    
     public function create() {

        if (isset($_POST)) {
            $data = array();
            $data['title'] = $_POST['title'];
            $data['description'] = $_POST['description'];
            $data['status'] = 'pending';
            $data['customer_id'] = Session::get('id');

            $rowcount = $this->model->create($data);
            if ($rowcount) {
                $this->view->JobList = $this->model->JobList();
                $this->view->render('CustomerRequestJob/index');
            } else {
                header('location: ' . URL . 'CustomerRequestJob');
            }
        }
    }

    public function edit($id) {
        $this->view->job = $this->model->listJob($id);
        $this->view->render('CustomerRequestJob/edit');
    }

    public function editSave($id) {
        if (isset($_POST)) {
            $data = array();
            $data['title'] = $_POST['title'];
            $data['description'] = $_POST['description'];
            $data['status'] = 'pending';
            $data['customer_id'] = Session::get('id');
            $data['id'] = $id;

            $rowcount = $this->model->editSave($data);
            if ($rowcount) {
                $this->view->JobList = $this->model->JobList();
                $this->view->render('CustomerRequestJob/index');
            } else {
                header('location: ' . URL . 'CustomerRequestJob');
            }
        }
    }

    public function delete($id) {
        $this->model->delete($id);
        header('location: ' . URL . 'CustomerRequestJob');
    }

}
