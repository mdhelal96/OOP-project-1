<?php

namespace App\Classes;

class Auth extends Config
{
    /**
     * @param $name
     * @param $email
     * @param $password
     */
    public function register($name, $email, $password)
    {
        $result = $this->conn->query("INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name', '$email', '$password')");

        return $result ? true : false;
    }

    /**
     * @param $email
     */
    public function user_exist($email)
    {
        $result = $this->conn->query("SELECT `name`, `email` FROM `users` WHERE `email` = '$email'");
        return $result->num_rows;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function login($email)
    {
        $result = $this->conn->query("SELECT * FROM `users` WHERE `email` = '$email'");
        return $result;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getUser($email)
    {
        $result = $this->conn->query("SELECT * FROM `users` WHERE `email` = '$email'");
        return $result;
    }

    /**
     * @param $token
     * @param $email
     */
    public function tokenUpdate($token, $email)
    {
        $query = $this->conn->query("UPDATE `users` SET `token`='$token' WHERE `email`='$email'");
        return $query;
    }

    /**
     * @param $email
     * @param $token
     * @return mixed
     */
    public function check_token($email, $token)
    {
        $result = $this->conn->query("SELECT * FROM `users` WHERE `email` = '$email' AND `token` = '$token'");
        return $result;
    }

    /**
     * @param $email
     * @param $password
     * @return mixed
     */
    public function reset_password($email, $password)
    {
        $result = $this->conn->query("UPDATE `users` SET `password`='$password' WHERE `email`='$email'");
        return $result;
    }

    public function isLogin()
    {
        return isset($_SESSION['user_email']) ? true : false;
    }
}
