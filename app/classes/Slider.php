<?php

namespace App\classes;

use App\Classes\Config;

class Slider extends Config {
    public function saveSlider( $title, $sub_title, $start_date, $end_date, $url_1, $status, $image ) {
        session_start();
        $user_id = $_SESSION['user_id'];

        return $this->conn->query( "INSERT INTO `sliders`( `title`, `sub_title`, `start_date`, `end_date`, `url_1`, `image`, `status`, `create_by`) VALUES ('$title', '$sub_title', '$start_date', '$end_date', '$url_1', '$image', '$status', '$user_id' )" );
    }

    public function Slider() {
        return $this->conn->query( 'SELECT * FROM `sliders`' );
    }

    public function GetSlider( $id ) {
        return $this->conn->query( "SELECT * FROM `sliders` WHERE `id` ='$id'" );
    }

    public function SlideStatus( $statusNomb ) {
        return $statusNomb == 1 ? "<label class='label label-success'>Active</label>" : "<label class='label label-danger'>Inactive</label>";
    }

    public function Delete( $id ) {
        return $this->conn->query( "DELETE FROM `sliders` WHERE `id` ='$id' " );
    }

}
