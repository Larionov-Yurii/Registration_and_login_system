<?php
// Class with implementation logic for user logging in system
session_start();

class Login extends DatabaseConnection
{
    protected function getUser($login, $password) {
        $stmt = $this->connect()->prepare("SELECT * FROM `New_users` WHERE `login` = '$login' OR `email` = '$login'");

        if (!$stmt->execute()) {
            $stmt = null;
            $_SESSION['wrong-stmt'] = 'Wrong Statement';
            header("Location: ../Login_page.php");
            exit();
        }

        $password_hashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $check_password = password_verify($password, $password_hashed[0]["password"]);

        if ($check_password == false || $stmt->rowCount() == 0) {
            $stmt = null;
            $_SESSION['wrong-log-or-pass'] = 'Wrong Login or Password';
            header("Location: ../Login_page.php");
            exit();
        }

        if ($check_password == true) {
            if (!$stmt->execute()) {
                $stmt = null;
                $_SESSION['wrong-stmt'] = 'Wrong Statement';
                header("Location: ../Login_page.php");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION["id"] = $user[0]["id"];
            $_SESSION["login"] = $user[0]["login"];
            header("Location: ../Private_area/User_panel.php");

            $stmt = null;
        }
    }

}