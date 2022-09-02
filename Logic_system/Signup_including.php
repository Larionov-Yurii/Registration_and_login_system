<?php
// The file with process of preparing for registration user

if (isset($_POST["do-signup"])) {

    // Grabbing the data
    $login            = $_POST["login"];
    $email            = $_POST["email"];
    $password         = $_POST["password"];
    $password_2       = $_POST["password-2"];
    $secret_question  = $_POST["secret-question"];

    // Instantiate SignupController class
    include "../Connection_database/DatabaseConnection.php";
    include "../Classes_signup/Signup.php";
    include "../Classes_signup/SignupController.php";

    $signup = new SignupController($login, $email, $password, $password_2, $secret_question);

    // Running error handlers and user signup
    $signup->signupUser();

}