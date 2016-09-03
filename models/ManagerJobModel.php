<?php

class ManagerJobModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function countJobs() {
        $sth = $this->db->prepare("SELECT COUNT(id) FROM camss_job");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function listCustomer($customer_id) {
        $sth = $this->db->prepare("SELECT * FROM camss_customer WHERE id = :id ");
        $sth->execute(array(':id' => $customer_id));
        return $sth->fetch();
    }
    
    public function listJob($id) {
        $sth = $this->db->prepare("SELECT * FROM camss_job WHERE id = :id ");
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    public function showJobList() {
        $sth = $this->db->prepare("SELECT * FROM camss_job WHERE status <> :status");
        $sth->execute(array(':status'=>'sent'));
        return $sth->fetchAll();
    }

    public function editSave($data) {
        try {


            $sth = $this->db->prepare("UPDATE camss_job SET `status` = :status,`updated_at` = :updated_at WHERE `id` = :id");

            $sth->execute(array(
                ':status' => $data['status'],
                ':updated_at' => date('Y-m-d H:i:s'),
                ':id' => $data['id']
            ));
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}
