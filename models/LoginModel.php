<?php

class LoginModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function run() {

        try {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $stmt = $this->db->prepare("SELECT * FROM camss_user WHERE username=:username AND password=MD5(:password)");
            $stmt->execute(array(':username' => $username, ':password' => $password));

            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $stmt->rowCount();

            if ($count > 0) {
                Session::init();
                Session::set('id', $userRow['id']);
                Session::set('username', $userRow['username']);
                Session::set('role', $userRow['role']);
                Session::set('created_at', $userRow['created_at']);
                Session::set('updated_at', $userRow['updated_at']);
                Session::set('loggedIn', true);
                header('location: ../dashboard');
                exit();
            } else {
                header('location: ../login?msg=000');
                exit();
            }
        } catch (PDOException $e) {
            echo $e->getMessage;
        }
    }

}
