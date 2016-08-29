<?php

class DashboardController extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            Session::destroy();
            header('location: login');
            exit();
        }
        
        //$this->view->js = array();
        
       
    }

    public function index() {
         
        $this->view->render('Dashboard/index');
    }

    public function logout() {
        Session::destroy();
        header('location: ../login');
        exit();
    }
    
    
    

}
