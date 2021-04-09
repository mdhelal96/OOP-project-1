<?php

namespace App\classes;

use App\Classes\Config;

class Slider extends Config {
    public function saveSlider( $title, $sub_title, $start_date, $end_date, $url_1, $status, $image ) {
        $user_id = $_SESSION['user_id'];

        return $this->conn->query( "INSERT INTO `sliders`( `title`, `sub_title`, `start_date`, `end_date`, `url_1`, `image`, `status`, `create_by`) VALUES ('$title', '$sub_title', '$start_date', '$end_date', '$url_1', '$image', '$status', '$user_id' )" );
    }
}
