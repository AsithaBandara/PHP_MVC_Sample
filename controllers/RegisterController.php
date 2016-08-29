<?php

class RegisterController extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('Register/index');
    }

    public function create() {

        if (isset($_POST)) {
            $data = array();
            $data['username'] = $_POST['username'];
            $data['first_name'] = $_POST['first_name'];
            $data['last_name'] = $_POST['last_name'];
            $data['role'] = 'customer';
            $data['password'] = md5($_POST['password']);

            $password_again = md5($_POST['password_again']);

            if (md5($_POST['password']) != $password_again) {

                $this->view->error = array('error' => 'Password Not matched !');
                $this->view->render('Register/index');
            } else {
                $rowcount = $this->model->create($data);
                if ($rowcount) {
                    $this->view->error = array('error' => 'User Already Exists !');
                    $this->view->render('Register/index');
                } else {
                    header('location: ' . URL . 'Index');
                }
            }
        }
    }

}
