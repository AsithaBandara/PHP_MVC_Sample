<?php

class ProjectController extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        if ($logged == false || $role != 'manager') {
            Session::destroy();
            header('location: login');
            exit();
        }

        //$this->view->js = array();
    }

    public function index() {
        $this->view->JobList = $this->model->JobList();
        $this->view->render('Project/index');
    }

    public function create() {

        if (isset($_POST)) {
            $data = array();
            $data['title'] = $_POST['title'];
            $data['description'] = $_POST['description'];
            $data['status'] = $_POST['status'];

            $rowcount = $this->model->create($data);
            if ($rowcount) {
                $this->view->NewsList = $this->model->NewsList();
                $this->view->render('NewsFeed/index');
            } else {
                header('location: ' . URL . 'NewsFeed');
            }
        }
    }
    
    
    public function send($id){
        
    }

    public function edit($id) {
        $this->view->news = $this->model->listNewsFeed($id);
        $this->view->render('NewsFeed/edit');
    }

    public function editSave($id) {
        if (isset($_POST)) {
            $data = array();
            $data['id'] = $id;
            $data['title'] = $_POST['title'];
            $data['description'] = $_POST['description'];
            $data['status'] = $_POST['status'];

            $rowcount = $this->model->editSave($data);
            if ($rowcount) {
                $this->view->NewsList = $this->model->NewsList();
                
                $this->view->render('NewsFeed/index');
            } else {
                header('location: ' . URL . 'NewsFeed');
            }
        }
    }

    public function delete($id) {
        $this->model->delete($id);
        header('location: ' . URL . 'NewsFeed');
    }

}
