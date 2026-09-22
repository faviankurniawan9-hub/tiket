<?php

session_start();

require_once "models/User.php";

class AuthController
{
    private $user;

    public function __construct($conn)
    {
        $this->user = new User($conn);
    }

    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->user->login($username, $password);

        if ($user) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: index.php");
            exit;

        } else {

            echo "Username atau password salah";

        }
    }
}