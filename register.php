<?php
/**
 * Created by PhpStorm.
 * User: wap18
 * Date: 23/02/15
 * Time: 14:06
 */
session_start();
include 'helper/Database.class.php';
include 'view/header.phtml';

include 'view/register.phtml';


$db = new Helper_Database("mysql:host=localhost;dbname=blog","root","troiswa");
$register = $query-> fetchAll("INSERT INTO `user`(`username`, `email', 'password')
VALUES (:id)");




include 'view/footer.phtml';