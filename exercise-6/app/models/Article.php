<?php

class Article
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getArticles(){
        $this->db->query('SELECT id, title, image, created_at FROM news ORDER BY created_at DESC');

        $results = $this->db->resultSet();
        foreach ($results as $result) {
            $result->image = explode(' ', $result->image);
        }

        return $results;
    }

    public function getArticleById($id){
        $this->db->query('SELECT * FROM news WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        $row->image = explode(' ', $row->image);
        return $row;
    }

    public function addArticle($data){
        $this->db->query('INSERT INTO news (title, description, image) VALUES(:title, :description, :image)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':image', $this->arrayToString($data['images']));

        if ($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function updateArticle($data){
        $this->db->query('UPDATE news SET title = :title, description = :description, image = :image WHERE id = :id');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':image', $this->arrayToString($data['images']));
        $this->db->bind(':id', $data['id']);

        if ($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteArticle($id){
        $this->db->query('DELETE FROM news WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    private function arrayToString($images){
        $store = '';
        foreach ($images as $image) {
            $store .= $image['name'] . ' ';
        }
        return $store;
    }

}