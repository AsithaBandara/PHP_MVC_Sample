<?php

class CustomerController extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        if ($logged == false || $role != 'customer') {
            Session::destroy();
            header('location: login');
            exit();
        }

        //$this->view->js = array();
    }

    public function index() {
        $this->view->listCustomer = $this->model->listCustomer(Session::get('id'));
        $this->view->render('Customer/index');
    }

    
    public function editSave($id) {
        if (isset($_POST)) {
            $data = array();
            $data['id'] = $id;
            $data['first_name'] = $_POST['first_name'];
            $data['last_name'] = $_POST['last_name'];
            $data['house_no'] = $_POST['house_no'];
            $data['street_name'] = $_POST['street_name'];
            $data['city'] = $_POST['city'];
            $data['country'] = $_POST['country'];
            $data['postal_code'] = $_POST['postal_code'];
            $data['dob'] = $_POST['dob'];
            $data['telephone'] = $_POST['telephone'];
            $data['picture'] = $_POST['picture'];

            $this->model->editSave($data);
            header('location: ' . URL . 'Customer');
        }
    }

    public function delete($id) {


        if (isset($_POST)) {
            $data = array();
            $data['id'] = $id;
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];
            $data['description'] = $_POST['description'];

            if ($data['email'] == Session::get('username')) {
                $this->model->delete($data);
                header('location: ' . URL . 'Login');
            }
            else{
                header('location: ' . URL . 'Customer');
            }
        }
    }

}
