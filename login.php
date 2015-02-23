<?php
/**
 * Created by PhpStorm.
 * User: wap18
 * Date: 23/02/15
 * Time: 14:06
 */
session_start();
include 'view/header.phtml';
require_once 'helper/Database.class.php';
require_once "model/User.class.php";
include 'view/login.phtml';


$db = new Helper_Database("mysql:host=localhost;dbname=user","root","troiswa");
$login = $query-> fetchAll("SELECT * FROM user WHERE username= :name");

if (array_key_exists("password", $_POST) && array_key_exists("name", $_POST))
{
    // je tente de connecter l'utilisateur

    $userManager = new User(); // Model/User.class.php

    if ($userManager->verifLogin($_POST["name"], $_POST["password"]) != false)
    {
        // enregistrer les informations utilisateur en session
        $_SESSION['name']=$login['username'];
        $_SESSION['id']=$login['id'];
        // redirection sur la page d'accueil
        header('Location: index.php');
    }


}









include 'view/footer.phtml';