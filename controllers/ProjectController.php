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
        $this->view->Projects = $this->model->ProjectList();
        $this->view->JobList = $this->model->JobList();
        $this->view->render('Project/index');
    }
    
    public function project_dashboard($id) {
        $this->view->Project = $this->model->listProject($id);
        $this->view->render('Project/Project_Dashboard');
    }

    public function send($id) {
        $this->view->ListJob = $this->model->ListJob($id);
        $this->view->Customer = $this->model->ListCustomer($id);

        // print_r($this->view->Customer);
        $this->view->render('Project/Project_details');
    }

    public function initiate() {
        if (isset($_POST)) {
            $data = array();
            $data['job_id'] = $_POST['job_id'];
            $data['customer_id'] = $_POST['customer_id'];
            $data['title'] = $_POST['title'];
            $data['description'] = $_POST['description'];
            $data['status'] = $_POST['status'];
            $data['manager_id'] = Session::get('id');



            $rowcount = $this->model->initiate($data);
            if ($rowcount) {


                $this->view->render('Project/index');
            } else {
                header('location: ' . URL . 'Project');
            }
        }
    }

    public function assign() {
        if (isset($_POST)) {
            $data = array();
            $data['project_id'] = $_POST['project_id'];
            $data['start_date'] = $_POST['start_date'];
            $data['end_date'] = $_POST['end_date'];
            $data['leader_id'] = $_POST['leader_id'];

            $rowcount = $this->model->assign($data);

            if ($rowcount) {
                $this->view->render('Project/index');
            } else {
                header('location: ' . URL . 'Project');
            }
        }
    }

    public function sendtoassign($id) {
        $this->view->Leader = $this->model->ListLeader();
        $this->view->Customer = $this->model->ListCustomertoProject($id);
        $this->view->Project = $this->model->listprojecttoassign($id);
       $this->view->render('Project/Assign_Leader');
    }

    public function listprojects() {
        $this->view->Projects = $this->model->AssignedProjects();
        $this->view->render('Project/List_Project');
    }

}
