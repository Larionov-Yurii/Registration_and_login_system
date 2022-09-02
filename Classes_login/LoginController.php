<?php
// Class with certain private credentials for login and checking some errors
session_start();

class LoginController extends Login
{
    private $login;
    private $password;

    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function loginUser() {
        if ($this->emptyInput() == false) {
            $_SESSION['empty-inputs'] = 'Empty login or password';
            header("Location: ../Login_page.php");
            exit();
        }

        $this->getUser($this->login, $this->password);
    }

    private function emptyInput() {
        if (empty($this->login) || empty($this->password )) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}