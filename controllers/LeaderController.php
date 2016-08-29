<?php

class LeaderController extends Controller {

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
        $this->view->LeaderList = $this->model->LeaderList();
        $this->view->render('Leader/index');
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
                $this->view->LeaderList = $this->model->LeaderList();
                $this->view->error = array('error' => 'Password Mismatch !');
                $this->view->render('Manager/index');
            } else {

                $rowcount = $this->model->create($data);
                if ($rowcount) {
                    $this->view->LeaderList = $this->model->LeaderList();
                    $this->view->error = array('error' => 'Leader Already Exists !');
                    $this->view->render('Leader/index');
                } else {
                    header('location: ' . URL . 'Leader');
                }
            }
        }
    }

    public function edit($id) {
        $this->view->user = $this->model->listLeader($id);
        $this->view->render('Leader/edit');
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
                $this->view->LeaderList = $this->model->LeaderList();
                $this->view->error = array('error' => 'Password Mismatch !');
                $this->view->render('Leader/index');
            } else {



                $this->model->editSave($data);
                header('location: ' . URL . 'Leader');
            }
        }
    }

    public function delete($id) {
        $this->model->delete($id);
        header('location: ' . URL . 'Leader');
    }

}
