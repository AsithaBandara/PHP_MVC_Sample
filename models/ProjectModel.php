<?php

class ProjectModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function listJob($id) {
        $sth = $this->db->prepare("SELECT * FROM camss_job WHERE id = :id ");
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }
    
    
    public function listprojecttoassign($id) {
        $sth = $this->db->prepare("SELECT * FROM camss_project WHERE id = :id ");
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    public function JobList() {

        $sth = $this->db->prepare("SELECT * FROM camss_job WHERE `status` = :status");
        $sth->execute(array(':status' => 'accepted'));
        return $sth->fetchAll();
    }

    public function ProjectList() {

        $sth = $this->db->prepare("SELECT * FROM camss_project");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function AssignedProjects() {

        $sth = $this->db->prepare("SELECT" .
                " p.id AS project_id, p.job_id AS job_id, c.first_name AS customer_first_name, " .
                " l.first_name AS leader_first_name , m.first_name AS manager_first_name, p.start_date AS start_date, " .
                " p.end_date AS end_date, p.title AS title, p.description AS description, p.status AS status " .
                " FROM camss_project p , camss_customer c , camss_team_leader l, camss_manager m , camss_job j " .
                " WHERE p.manager_id = m.id AND p.customer_id = c.id AND p.leader_id = l.id AND p.job_id = j.id");

        $sth->execute();

        return $sth->fetchAll();
    }

    public function ListCustomer($id) {

        $sth = $this->db->prepare("SELECT customer_id FROM camss_job WHERE id = :id ");
        $sth->execute(array(':id' => $id));
        $row = $sth->fetchAll();

        $customer_id = $row[0]['customer_id'];

        $sth = $this->db->prepare("SELECT * FROM camss_customer WHERE id = :id ");
        $sth->execute(array(':id' => $customer_id));
        $customer = $sth->fetch();
        return $customer;
    }

    public function ListCustomertoProject($id) {

        $sth = $this->db->prepare("SELECT customer_id FROM camss_project WHERE id = :id ");
        $sth->execute(array(':id' => $id));
        $row = $sth->fetchAll();

        $customer_id = $row[0]['customer_id'];

        $sth = $this->db->prepare("SELECT * FROM camss_customer WHERE id = :id ");
        $sth->execute(array(':id' => $customer_id));
        $customer = $sth->fetch();
        return $customer;
    }

    public function ListProject($id) {
        $sth = $this->db->prepare("SELECT "
                . "p.id AS project_id , "
                . "p.title AS title , "
                . "p.description As description,"
                . "p.status AS status,"
                . "p.job_id AS job_id,"
                . "p.start_date AS start_date,"
                . "p.end_date AS end_date,"
                . "p.customer_id AS customer_id,"
                . "p.created_at AS created_at,"
                . "p.updated_at AS updated_at,"
                . "c.first_name AS customer_first_name,"
                . "c.email AS customer_email,"
                . "c.telephone AS customer_telephone,"
                . "c.city AS customer_city,"
                . "p.leader_id AS leader_id,"
                . "l.first_name AS leader_first_name,"
                . "l.telephone As leader_telephone,"
                . "l.status AS leader_status,"
                . "l.email AS leader_email,"
                . "p.manager_id AS manager_id,"
                . "m.email AS manager_email,"
                . "m.first_name AS manager_first_name,"
                . "m.telephone AS manager_telephone,"
                . "m.status AS manager_status "
                . " FROM camss_project p,camss_customer c,camss_team_leader l,camss_manager m "
                . " WHERE p.customer_id = c.id AND p.leader_id = l.id AND p.manager_id = m.id AND p.id = :id;");
        $sth->execute(array(':id' => $id));
        
        $project = $sth->fetch();
        return $project;
    }

    public function ListLeader() {
        $sth = $this->db->prepare("SELECT * FROM camss_team_leader WHERE `status` = :status");
        $sth->execute(array(':status' => 'available'));
        $leader = $sth->fetchAll();
        return $leader;
    }

    public function initiate($data) {
        try {


            $sth = $this->db->prepare("INSERT INTO camss_project (`title`,`description`,`status`,`customer_id`,`manager_id`,`job_id`,`created_at`) "
                    . "VALUES (:title,:description,:status,:customer_id,:manager_id,:job_id,:created_at)");

            $sth->execute(array(
                ':title' => $data['title'],
                ':description' => $data['description'],
                ':status' => $data['status'],
                ':customer_id' => $data['customer_id'],
                ':job_id' => $data['job_id'],
                ':manager_id' => $data['manager_id'],
                ':created_at' => date('Y-m-d H:i:s')
            ));


            $sth = $this->db->prepare("UPDATE camss_job SET `status` = :status, `updated_at` = :updated_at WHERE `id` = :id");

            $sth->execute(array(
                ':status' => 'sent',
                ':updated_at' => date('Y-m-d H:i:s'),
                ':id' => $data['job_id']
            ));
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function assign($data) {
        try {


            $sth = $this->db->prepare("UPDATE camss_project SET `start_date` = :start_date , `end_date` = :end_date , `leader_id`=:leader_id , `updated_at`= :updated_at"
                    . " WHERE `id` = :id");

            $sth->execute(array(
                ':start_date' => $data['start_date'],
                ':end_date' => $data['end_date'],
                ':leader_id' => $data['leader_id'],
                ':updated_at' => date('Y-m-d H:i:s'),
                ':id' => $data['project_id']
            ));
            
            $sth = $this->db->prepare("UPDATE camss_leader SET `status` = :status, `updated_at`= :updated_at"
                    . " WHERE `id` = :leader_id");
            
             $sth->execute(array(
                ':status' => 'occuipied',
                ':leader_id' => $data['leader_id'],
                ':updated_at' => date('Y-m-d H:i:s')
                
            ));

        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

}
