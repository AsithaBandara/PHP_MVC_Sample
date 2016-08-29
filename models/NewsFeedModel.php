<?php

class NewsFeedModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function listNewsFeed($id) {
        $sth = $this->db->prepare("SELECT * FROM camss_news WHERE id = :id ");
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    public function NewsList() {

        $sth = $this->db->prepare("SELECT * FROM camss_news");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function create($data) {
        try {


            $sth = $this->db->prepare("INSERT INTO camss_news (`title`,`description`,`status`,`created_at`) VALUES (:title,:description,:status,:created_at)");

            $sth->execute(array(
                ':title' => $data['title'],
                ':description' => $data['description'],
                ':status' => $data['status'],
                ':created_at' => date('Y-m-d H:i:s')
            ));
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function editSave($data) {
        try {


            $sth = $this->db->prepare("UPDATE camss_news SET `title` = :title , `description` = :description,`status`= :status ,`updated_at` = :updated_at WHERE `id` = :id");

            $sth->execute(array(
                ':title' => $data['title'],
                ':description' => $data['description'],
                ':status' => $data['status'],
                ':updated_at' => date('Y-m-d H:i:s'),
                ':id' => $data['id']
            ));
            
            print_r($sth);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id) {

        $sth = $this->db->prepare("DELETE FROM camss_news WHERE id = :id");
        $sth->execute(array(
            ':id' => $id
        ));
    }

}
