<?php

class DataEntryController extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        if ($logged == false || $role != 'admin') {
            Session::destroy();
            header('location: login');
            exit();
        }

        //$this->view->js = array();
    }

    public function index() {
        $this->view->DataEntryList = $this->model->DataEntryList();
        $this->view->render('DataEntry/index');
    }

    public function create() {

        if (isset($_POST)) {
            $data = array();
            $data['username'] = $_POST['username'];
            $data['password'] = md5($_POST['password']);
            $data['description'] = $_POST['description'];
            $data['role'] = 'leader';
            $data['status'] = 'available';


            $password_again = md5($_POST['password_again']);




            if (md5($_POST['password']) != $password_again) {
                $this->view->DataEntryList = $this->model->DataEntryList();
                $this->view->error = array('error' => 'Password Mismatch !');
                $this->view->render('DataEntry/index');
            } else {

                $rowcount = $this->model->create($data);
                if ($rowcount) {
                    $this->view->DataEntryList = $this->model->DataEntryList();
                    $this->view->error = array('error' => 'Data Entry Already Exists !');
                    $this->view->render('DataEntry/index');
                } else {
                    header('location: ' . URL . 'DataEntry');
                }
            }
        }
    }

    public function edit($id) {
        $this->view->user = $this->model->listDataEntry($id);
        $this->view->render('DataEntry/edit');
    }

    public function editSave($id) {
        if (isset($_POST)) {
            $data = array();
            $data['username'] = $_POST['username'];
            $data['password'] = md5($_POST['password']);
            $data['description'] = $_POST['description'];
            $data['role'] = 'leader';
            $data['status'] = 'available';
            $data['id'] = $id;

            $password_again = md5($_POST['password_again']);




            if (md5($_POST['password']) != $password_again) {
                $this->view->DataEntryList = $this->model->DataEntryList();
                $this->view->error = array('error' => 'Password Mismatch !');
                $this->view->render('DataEntry/index');
            } else {



                $this->model->editSave($data);
                header('location: ' . URL . 'DataEntry');
            }
        }
    }

    public function delete($id) {
        $this->model->delete($id);
        header('location: ' . URL . 'DataEntry');
    }

}
