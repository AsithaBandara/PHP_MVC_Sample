<?php

class RegisterModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function create($data) {
        try {



            $sth = $this->db->prepare('SELECT id FROM camss_user WHERE username = :username');
            $sth->execute(array(
                ':username' => $data['username']
            ));

            $sth->fetch();
            if ($sth->rowCount() > 0) {

                return "User Already Exists";
            } else {
                $sth = $this->db->prepare("INSERT INTO camss_user (`username`,`password`,`role`,`created_at`) VALUES (:username,:password,:role,:created_at)");

                $sth->execute(array(
                    ':username' => $data['username'],
                    ':password' => $data['password'],
                    ':role' => $data['role'],
                    ':created_at' => date('Y-m-d H:i:s')
                ));



                $sth = $this->db->prepare('SELECT id FROM camss_user WHERE username = :username');
                $sth->execute(array(
                    ':username' => $data['username']
                ));

                $last_id_arry = $sth->fetch(PDO::FETCH_ASSOC);
                $last_id = $last_id_arry['id'];


                $sth = $this->db->prepare("INSERT INTO camss_customer (`id`,`first_name`,`last_name`,`email`,`created_at`) VALUES (:id,:first_name,:last_name,:email,:created_at)");
                $sth->execute(array(
                    ':id' => $last_id,
                    ':first_name' => $data['first_name'],
                    ':last_name' => $data['last_name'],
                    ':email' => $data['username'],
                    ':created_at' => date('Y-m-d H:i:s')
                ));
            }





            // $sth->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
