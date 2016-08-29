<?php

class DashboardModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function countManagers() {
        $sth = $this->db->prepare("SELECT COUNT(id) FROM camss_manager");
        $sth->execute();
        return $sth->fetchAll();
    }
    
    public function countJobs() {
        $sth = $this->db->prepare("SELECT COUNT(id) FROM camss_job");
        $sth->execute();
        return $sth->fetchAll();
    }

    
    public function countLeaders() {
        $sth = $this->db->prepare("SELECT COUNT(id) FROM camss_team_leader");
        $sth->execute();
        return $sth->fetchAll();
    }
    
    
    public function countCustomers() {
        $sth = $this->db->prepare("SELECT COUNT(id) FROM camss_customer");
        $sth->execute();
        return $sth->fetchAll();
    }
    
    
    public function countDataEntries() {
        $sth = $this->db->prepare("SELECT COUNT(id) FROM camss_data_entry");
        $sth->execute();
        return $sth->fetchAll();
    }
    
    public function countProjects(){
        $sth = $this->db->prepare("SELECT COUNT(id) FROM camss_project");
        $sth->execute();
        return $sth->fetchAll();
    }
    
    public function showNews(){
        $sth = $this->db->prepare("SELECT * FROM camss_news WHERE status = 'active' ORDER BY created_at LIMIT 2");
        $sth->execute();
        return $sth->fetchAll();
    }
    
    public function showCustomersQuit(){
        $sth = $this->db->prepare("SELECT * FROM camss_quit_customer");
        $sth->execute();
        return $sth->fetchAll();
    }
    
    public function showJobList(){
        $sth = $this->db->prepare("SELECT * FROM camss_job WHERE status = :status");
        $sth->execute(array(':status' => 'pending'));
        return $sth->fetchAll();
    }
    
    
    
    
    
    

}
