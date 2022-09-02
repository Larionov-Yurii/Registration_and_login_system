<?php
// The file with process of preparing for user logging

if (isset($_POST["do-login"])) {

    // Grabbing the data
    $login            = $_POST["login"];
    $password         = $_POST["password"];

    // Instantiate LoginController class
    include "../Connection_database/DatabaseConnection.php";
    include "../Classes_login/Login.php";
    include "../Classes_login/LoginController.php";

    $user_login = new LoginController($login, $password);

    // Running error handlers and user logging
    $user_login->loginUser();

}