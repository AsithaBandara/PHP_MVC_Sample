<?php

class LeaderModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function listLeader($id) {
        $sth = $this->db->prepare("SELECT * FROM camss_team_leader WHERE id = :id ");
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    public function LeaderList() {

        $sth = $this->db->prepare("SELECT * FROM camss_team_leader");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function create($data) {
        try {



            $sth = $this->db->prepare('SELECT id FROM camss_user WHERE username = :username');
            $sth->execute(array(
                ':username' => $data['username']
            ));

            $sth->fetch();
            if ($sth->rowCount() > 0) {

                return "Leader Already Exists";
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


                $sth = $this->db->prepare("INSERT INTO camss_team_leader (`id`,`email`,`description`,`status`,`created_at`) VALUES (:id,:username,:description,:status,:created_at)");

                $sth->execute(array(
                    ':id' => $last_id,
                    ':username' => $data['username'],
                    ':description' => $data['description'],
                    ':status' => $data['status'],
                    ':created_at' => date('Y-m-d H:i:s')
                ));
            }


            // $sth->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function editSave($data) {
        try {


            $sth = $this->db->prepare("UPDATE camss_user SET `username` = :username , `password` = :password,`role`= :role ,`updated_at` = :updated_at WHERE `id` = :id");

            $sth->execute(array(
                ':username' => $data['username'],
                ':password' => $data['password'],
                ':role' => $data['role'],
                ':updated_at' => date('Y-m-d H:i:s'),
                ':id' => $data['id'],
            ));


            print_r($sth);

            $sth = $this->db->prepare("UPDATE camss_team_leader SET `email` = :username , `description` = :description,`status`= :status ,`updated_at` = :updated_at WHERE `id` = :id");

            $sth->execute(array(
                ':id' => $data['id'],
                ':username' => $data['username'],
                ':description' => $data['description'],
                ':status' => $data['status'],
                ':updated_at' => date('Y-m-d H:i:s')
            ));


            print_r($sth);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id) {

        $sth = $this->db->prepare("DELETE FROM camss_user WHERE id = :id");
        $sth->execute(array(
            ':id' => $id
        ));

        $sth = $this->db->prepare("DELETE FROM camss_team_leader WHERE id = :id");
        $sth->execute(array(
            ':id' => $id
        ));
    }

}
