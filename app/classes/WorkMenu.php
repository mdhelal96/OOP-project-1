<?php

namespace App\classes;

use App\Classes\Config;

class WorkMenu extends Config {

    /**
     * saveWorkMenu.
     *
     * @author    Helal Uddin
     * @since    v0.0.1
     * @version    v1.0.0    Friday, April 16th, 2021.
     * @access    public
     * @param    mixed    $name
     * @param    mixed    $status
     * @return    mixed
     */
    public function saveWorkMenu( $name, $status ) {
        session_start();
        $user_id = $_SESSION['user_id'];
        $slug    = strtolower( str_replace( " ", "-", $name ) );

        return $this->conn->query( "INSERT INTO `works_menu`(`name`, `slug`, `status`, `create_by`) VALUES ('$name','$slug','$status','$user_id')" );
    }

    /**
     * WorksMenu.
     *
     * @author    Helal Uddin
     * @since    v0.0.1
     * @version    v1.0.0    Friday, April 16th, 2021.
     * @access    public
     * @return    mixed
     */
    public function worksMenu() {
        return $this->conn->query( 'SELECT * FROM `works_menu` ORDER BY `id` DESC' );
    }
}
