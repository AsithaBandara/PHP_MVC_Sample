<?php



/**
 * Description of Bootstrap
 *
 * @author ADMAT
 */
class Bootstrap {

    function init() {

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, "/");
        $url = explode("/", $url);

        //Handle the default root page
        if (empty($url[0])) {
            $this->invokeDefaultPage();
            return false;
        }


        $file_name = "controllers/{$url[0]}Controller.php";

        // check whether the file exists
        if (file_exists($file_name)) {
            require($file_name);
        } else {
            $this->displayError();
        }

        $class_name = $url[0] . "Controller";
        $controller = new $class_name();
        $controller->loadModel($url[0]);
        //calling methods
        if (isset($url[2])) {

            if (method_exists($controller, $url[1])) {
                // if there are parameters
                $controller->{$url[1]}($url[2]);
            } else {

                $this->displayError();
            }
        } else {
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    $this->displayError();
                }
            } else {
                $controller->index();
            }
        }
    }

    // function to open the defualt page whenever it is needed   
    function invokeDefaultPage() {
        require("controllers/IndexController.php");
        $controller = new IndexController();
        $controller->index();
    }

    function displayError() {
        require 'controllers/ErrorController.php';
        $controller = new ErrorController();
        $controller->index();
        exit();
    }

}
