<?php
require_once "Mooncake.php";

class MooncakeRepository{
    private $db;

    public function __construct($config)
    {
        $this->db = new PDO("mysql:host=".$config["servername"].";dbname=".$config["dbname"], $config["username"], $config["password"]);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getMooncake($flavor){
        $stmt = $this->db->prepare("SELECT * FROM mooncakes WHERE CakeID = :flavor");
        $stmt->bindParam(':flavor', $flavor);
        $flavor = $flavor;
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $cake = $stmt->fetchAll()[0];
        return new Mooncake($cake["Name"], $cake["Price"], $cake["Description"], $cake["Images"]);
    }
}