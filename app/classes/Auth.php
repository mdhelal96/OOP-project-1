<?php

namespace App\Classes;

class Auth extends Config {
    /**
     * @param $name
     * @param $email
     * @param $password
     */
    public function register( $name, $email, $password ) {
        $result = $this->conn->query( "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name', '$email', '$password')" );

        return $result ? true : false;
    }

    /**
     * @param $email
     */
    public function user_exist( $email ) {
        $result = $this->conn->query( "SELECT `name`, `email` FROM `users` WHERE `email` = '$email'" );
        return $result->num_rows;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function login( $email ) {
        $result = $this->conn->query( "SELECT * FROM `users` WHERE `email` = '$email'" );
        return $result;
    }

    public function isLogin() {
        session_start();
        return isset( $_SESSION['user_email'] ) ? true : false;
    }
}
