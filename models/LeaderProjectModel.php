<?php

class LeaderProjectModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function listallProject($id) {

        $sth = $this->db->prepare("SELECT "
                . "p.id AS project_id , "
                . "p.title AS title , "
                . "p.description As description,"
                . "p.status AS status,"
                . "p.job_id AS job_id,"
                . "p.start_date AS start_date,"
                . "p.end_date AS end_date,"
                . "p.customer_id AS customer_id,"
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
                . " WHERE p.customer_id = c.id AND p.leader_id = l.id AND p.manager_id = m.id AND p.leader_id = :id;");
        $sth->execute(array(':id' => $id));

        $project = $sth->fetchAll();
        return $project;
    }

    public function listProject($id) {

        $sth = $this->db->prepare("SELECT "
                . "p.id AS project_id , "
                . "p.title AS title , "
                . "p.description As description,"
                . "p.status AS status,"
                . "p.job_id AS job_id,"
                . "p.start_date AS start_date,"
                . "p.end_date AS end_date,"
                . "p.customer_id AS customer_id,"
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

    public function listcomponents($id) {
        $sth = $this->db->prepare("SELECT * FROM camss_component WHERE `project_id` = :id");
        $sth->execute(array(':id' => $id));
        return $sth->fetchAll();
    }

    public function add_component($data) {

        try {
            $sth = $this->db->prepare("INSERT INTO "
                    . " camss_component (`start_date`,`end_date`,`project_id`,`title`,`description`,`status`,`created_at`) "
                    . " VALUES (:start_date,:end_date,:project_id,:title,:description,:status,:created_at)");

            $sth->execute(array(
                ':start_date' => $data['start_date'],
                ':end_date' => $data['end_date'],
                ':project_id' => $data['project_id'],
                ':title' => $data['title'],
                ':description' => $data['description'],
                ':status' => $data['status'],
                ':created_at' => date('Y-m-d H:i:s')
            ));
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

}
