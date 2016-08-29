<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author ADMAT
 */
class View {
   
    
    public function render($view_name){
        require 'views/header.php';
        require 'views/nav.php';
        require 'views/'.$view_name.'.php';
        require 'views/footer.php';
   
    }
    
    
    
    
    
    
    
}
