<?php

class CustomerModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function listCustomer($id) {
        $sth = $this->db->prepare("SELECT * FROM camss_customer WHERE id = :id ");
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    public function editSave($data) {
        try {

            $sth = $this->db->prepare("UPDATE camss_customer "
                    . "SET `first_name` = :first_name,"
                    . "`last_name` = :last_name,"
                    . "`house_no` = :house_no,"
                    . "`street_name` = :street_name,"
                    . "`city` = :city,"
                    . "`country` = :country,"
                    . "`postal_code` = :postal_code,"
                    . "`telephone` = :telephone,"
                    . "`dob` = :dob,"
                    . "`picture` = :picture,"
                    . "`updated_at` = :updated_at "
                    . "WHERE `id` = :id");

            $sth->execute(array(
                ':id' => $data['id'],
                ':first_name' => $data['first_name'],
                ':last_name' => $data['last_name'],
                ':house_no' => $data['house_no'],
                ':street_name' => $data['street_name'],
                ':city' => $data['city'],
                ':country' => $data['country'],
                ':postal_code' => $data['postal_code'],
                ':telephone' => $data['telephone'],
                ':dob' => $data['dob'],
                ':picture' => $data['picture'],
                ':updated_at' => date('Y-m-d H:i:s')
            ));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($data) {


        try {



            $username = $_POST['email'];
            $password = $_POST['password'];

            $stmt = $this->db->prepare("SELECT * FROM camss_user WHERE username=:username AND password=MD5(:password)");
            $stmt->execute(array(':username' => $username, ':password' => $password));

            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $stmt->rowCount();

            if ($count > 0) {

                $sth = $this->db->prepare("INSERT INTO camss_quit_customer (`email`,`description`,`created_at`)"
                        . "VALUES(:email,:description,:created_at)");
                $sth->execute(array(
                    ':email' => $data['email'],
                    ':description' => $data['description'],
                    ':created_at' => date('Y-m-d H:i:s')
                ));


                $sth = $this->db->prepare("DELETE FROM camss_user WHERE id = :id");
                $sth->execute(array(
                    ':id' => $data['id']
                ));


                $sth = $this->db->prepare("DELETE FROM camss_customer WHERE id = :id");
                $sth->execute(array(
                    ':id' => $data['id']
                ));

                Session::destroy();
                header('location: ' . URL . 'Login');
                exit();
                
            } else {
                
                header('location: ' . URL . 'Customer');
                exit();
                
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
