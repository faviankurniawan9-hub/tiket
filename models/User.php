<?php

class User
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM users 
                WHERE username='$username'
                AND password='$password'";

        $result = mysqli_query($this->conn, $sql);

        return mysqli_fetch_assoc($result);
    }
}