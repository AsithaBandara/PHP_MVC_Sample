<?php

class Controller {

    var $view = null;

    function __construct() {
        $this->view = new View();
    }

    public function loadModel($name) {

        $path = 'models/' . $name . 'Model.php';

        if (file_exists($path)) {
            require $path;
            $ModelName = $name.'Model';
            $this->model = new $ModelName();
        }
    }

}
