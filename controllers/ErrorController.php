<?php

class ErrorController extends Controller{

    function __construct() {
        parent::__construct();
        
    }
    
    public function index(){
        $this->view->msg='This page doew not exists';
        $this->view->render('Error/index');
    }

}
