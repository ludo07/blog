<?php
/**
 * Created by PhpStorm.
 * User: wap18
 * Date: 23/02/15
 * Time: 16:18
 */


Class Helper_Database
{
    // propriétés

    private $db;

    // methodes

    public function __construct($queryString, $user, $password)
    {
        $this->db = new PDO($queryString, $user, $password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec("SET NAMES UTF8");
    }

    public function fetchAll($query)
    {
        $query = $this->db->prepare($query, $data = array());
        $query->execute($data);
        $res = $query->fetchAll();

        return $res;
    }

    public function fetchOne($query)
    {
        $query = $this->db->prepare($query, $data = array());
        $query->execute($data);
        $res = $query->fetch();

        return $res;
    }

}

// exemple

//$db = new Helper_Database("mysql:host=127.0.0.1;dbname=minichat", "root", "troiswa");
//$messages = $db->fetchAll("SELECT * FROM message WHERE user = :id", array("id" => 2));
// prepare
// execute
// fetchall
