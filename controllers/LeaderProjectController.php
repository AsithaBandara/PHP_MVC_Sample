<?php

class LeaderProjectController extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        if ($logged == false || $role != 'teamleader') {
            Session::destroy();
            header('location: login');
            exit();
        }

        //$this->view->js = array();
    }

    public function index() {

        $this->view->AllProjects = $this->model->listallProject(Session::get('id'));
        $this->view->render('Leader/project');
    }

    public function Project_Dashboard($id) {
        $this->view->component = $this->model->listcomponents($id);
        $this->view->Project = $this->model->listProject($id);
        $this->view->render('Leader/Project_Dashboard');
    }

    public function add_component($project_id) {

        if (isset($_POST)) {
            $data = array();

            $data['project_id'] = $project_id;
            $data['title'] = $_POST['title'];
            $data['description'] = $_POST['description'];
            $data['start_date'] = $_POST['start_date'];
            $data['end_date'] = $_POST['end_date'];
            $data['status'] = $_POST['status'];

            $rowcount = $this->model->add_component($data);

            if ($rowcount) {
                $this->view->component = $this->model->listcomponents($project_id);
                $this->view->Project = $this->model->listProject($project_id);
                $this->view->render('LeaderProject/Project_Dashboard');
            }else{
                 header('location: ' . URL . 'LeaderProject/Project_Dashboard/' . $project_id);
            }
        }
    }

}
