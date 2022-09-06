<?php
session_start();
// Class with implementation logic for registration

class Signup extends DatabaseConnection
{
    protected function setUser($login, $email, $password, $secret_question) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->connect()->prepare("INSERT INTO `New_users` (`login`, `email`, `password`,`secret_question`) VALUES ('$login','$email','$hashedPassword','$secret_question')");

        if (!$stmt->execute()) {
            $stmt = null;
            $_SESSION['notes'] = 'Wrong Statement';
            header("Location: ../Registration_page/Registration_page.php");
            exit();
        } else {
            $stmt = null;
            $_SESSION['notes'] = 'I have good news for you, you are a new user in our system';
            header("Location: ../Registration_page/Registration_page.php");
            exit();
        }
    }

    protected function checkUser($login, $email) {
        $stmt = $this->connect()->prepare("SELECT `login` FROM `New_users` WHERE `login` = '$login' OR `email` = '$email';");

        if (!$stmt->execute()) {
            $stmt = null;
            $_SESSION['notes'] = 'Wrong Statement';
            header("Location: ../Registration_page/Registration_page.php");
            exit();
        }

            if($stmt->rowCount() > 0) {
                $resultCheck = false;
            } else {
                $resultCheck = true;
            }

            return $resultCheck;
    }

}