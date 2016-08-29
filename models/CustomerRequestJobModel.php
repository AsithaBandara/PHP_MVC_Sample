<?php

class customerRequestJobModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function listJob($id) {
        $sth = $this->db->prepare("SELECT * FROM camss_job WHERE id = :id ");
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    public function JobList() {

        $sth = $this->db->prepare("SELECT * FROM camss_job");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function PendingJobList() {

        $sth = $this->db->prepare("SELECT * FROM camss_job WHERE status = :status AND customer_id = :customer_id");
        $sth->execute(array(':status' => 'pending',':customer_id' => Session::get('id')));
        return $sth->fetchAll();
    }

    public function AcceptedJobList() {

        $sth = $this->db->prepare("SELECT * FROM camss_job WHERE status = :status AND customer_id = :customer_id");
        $sth->execute(array(':status' => 'accepted',':customer_id' => Session::get('id')));
        return $sth->fetchAll();
    }

    public function RejectedJobList() {

        $sth = $this->db->prepare("SELECT * FROM camss_job WHERE status = :status AND customer_id = :customer_id");
        $sth->execute(array(':status' => 'rejected',':customer_id' => Session::get('id')));
        return $sth->fetchAll();
    }

    public function create($data) {
        try {


            $sth = $this->db->prepare("INSERT INTO camss_job (`title`,`description`,`status`,`customer_id`,`created_at`) VALUES (:title,:description,:status,:customer_id,:created_at)");

            $sth->execute(array(
                ':title' => $data['title'],
                ':description' => $data['description'],
                ':status' => $data['status'],
                ':customer_id' => $data['customer_id'],
                ':created_at' => date('Y-m-d H:i:s')
            ));
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function editSave($data) {
        try {


            $sth = $this->db->prepare("UPDATE camss_job SET `title` = :title , `description` = :description ,`status` = :status,`customer_id`= :customer_id,`updated_at` = :updated_at WHERE `id` = :id");

            $sth->execute(array(
                ':title' => $data['title'],
                ':description' => $data['description'],
                ':status' => $data['status'],
                ':customer_id' => $data['customer_id'],
                ':updated_at' => date('Y-m-d H:i:s'),
                ':id' => $data['id']
            ));

            print_r($sth);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id) {

        $sth = $this->db->prepare("DELETE FROM camss_job WHERE id = :id");
        $sth->execute(array(
            ':id' => $id
        ));
    }

}
