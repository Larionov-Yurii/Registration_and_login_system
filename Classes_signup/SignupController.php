<?php
session_start();
// Class with certain private credentials and check for certain errors on registration

class SignupController extends Signup
{
    private $login;
    private $email;
    private $password;
    private $password_2;
    private $secret_question;

    public function __construct($login, $email, $password, $password_2, $secret_question) {
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
        $this->password_2 = $password_2;
        $this->secret_question = $secret_question;
    }

    public function signupUser() {
        if ($this->emptyInput() == false) {
            $_SESSION['notes'] = 'Empty Inputs';
            header("Location: ../Registration_page/Registration_page.php");
            exit();
        }

        if ($this->invalidLogin() == false) {
            $_SESSION['notes'] = 'Wierd name for creating a new login';
            header("Location: ../Registration_page/Registration_page.php");
            exit();
        }

        if ($this->invalidEmail() == false) {
            $_SESSION['notes'] = 'Wierd name for creating a new email';
            header("Location: ../Registration_page/Registration_page.php");
            exit();
        }

        if ($this->passwordMismatch() == false) {
            $_SESSION['notes'] = 'Password mismatch';
            header("Location: ../Registration_page/Registration_page.php");
            exit();
        }

        if ($this->loginTakenCheck() == false) {
            $_SESSION['notes'] = 'Login or email is already taken';
            header("Location: ../Registration_page/Registration_page.php");
            exit();
        }

        $this->setUser($this->login, $this->email, $this->password, $this->secret_question);
    }

    private function emptyInput() {
        if (empty($this->login) || empty($this->email)
            || empty($this->password || empty($this->password_2))
            || empty($this->secret_question)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidLogin() {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->login))
        {
         $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function passwordMismatch() {
        if ($this->password !== $this->password_2)
        {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function loginTakenCheck() {
        if (!$this->checkUser($this->login, $this->email))
        {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}