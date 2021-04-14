<?php

namespace App\classes;

use App\Classes\Config;

class Slider extends Config {

    /**
     * saveSlider.
     *
     * @author    Helal Uddin
     * @since    v0.0.1
     * @version    v1.0.0    Tuesday, April 13th, 2021.
     * @access    public
     * @param    mixed    $title
     * @param    mixed    $sub_title
     * @param    mixed    $start_date
     * @param    mixed    $end_date
     * @param    mixed    $url_1
     * @param    mixed    $status
     * @param    mixed    $image
     * @return    mixed
     */
    public function saveSlider( $title, $sub_title, $start_date, $end_date, $url_1, $status, $image ) {
        session_start();
        $user_id = $_SESSION['user_id'];

        return $this->conn->query( "INSERT INTO `sliders`( `title`, `sub_title`, `start_date`, `end_date`, `url_1`, `image`, `status`, `create_by`) VALUES ('$title', '$sub_title', '$start_date', '$end_date', '$url_1', '$image', '$status', '$user_id' )" );
    }

    /**
     * updateSlider.
     *
     * @author    Helal Uddin
     * @since    v0.0.1
     * @version    v1.0.0    Tuesday, April 13th, 2021.
     * @access    public
     * @param    mixed    $id
     * @param    mixed    $title
     * @param    mixed    $sub_title
     * @param    mixed    $start_date
     * @param    mixed    $end_date
     * @param    mixed    $url_1
     * @param    mixed    $status
     * @param    mixed    $image
     * @return    mixed
     */
    public function updateSlider( $id, $title, $sub_title, $start_date, $end_date, $url_1, $status, $image ) {
        session_start();
        $user_id = $_SESSION['user_id'];

        return $this->conn->query( "UPDATE `sliders` SET `title`='$title',`sub_title`='$sub_title',`start_date`='$start_date',`end_date`='$end_date',`url_1`='$url_1',`image`='$image',`status`='$status',`create_by`='$user_id' WHERE `id`='$id'" );
    }

    /**
     * Slider.
     *
     * @author    Helal Uddin
     * @since    v0.0.1
     * @version    v1.0.0    Tuesday, April 13th, 2021.
     * @access    public
     * @return    mixed
     */
    public function Slider() {
        return $this->conn->query( 'SELECT * FROM `sliders`' );
    }

    /**
     * GetSlider.
     *
     * @author    Helal Uddin
     * @since     v0.0.1
     * @version   v1.0.0    Tuesday, April 13th, 2021.
     * @access    public
     * @param     mixed    $id
     * @return    mixed
     */
    public function GetSlider( $id ) {
        return $this->conn->query( "SELECT * FROM `sliders` WHERE `id` ='$id'" );
    }

    /**
     * changeStatus.
     *
     * @author    Helal Uddin
     * @since     v0.0.1
     * @version   v1.0.0    Tuesday, April 13th, 2021.
     * @access    public
     * @param     mixed    $id
     * @param     mixed    $status
     * @return    mixed
     */
    public function changeStatus( $id, $status ) {
        return $this->conn->query( "UPDATE `sliders` SET `status`='$status' WHERE `id`='$id'" );
    }

    /**
     * SlideStatus.
     *
     * @author    Helal Uddin
     * @since    v0.0.1
     * @version    v1.0.0    Tuesday, April 13th, 2021.
     * @access    public
     * @param    mixed    $statusNomb
     * @return    mixed
     */
    public function SlideStatus( $statusNomb, $id ) {
        return "<label id='status-text-" . $id . "' class='label label-" . ( $statusNomb == 1 ? 'success' : 'danger' ) . "'>" . ( $statusNomb == 1 ? 'Active' : 'Inactive' ) . "</label>";
    }

    /**
     * Delete.
     *
     * @author    Helal Uddin
     * @since    v0.0.1
     * @version    v1.0.0    Tuesday, April 13th, 2021.
     * @access    public
     * @param    mixed    $id
     * @return    mixed
     */
    public function Delete( $id ) {
        return $this->conn->query( "DELETE FROM `sliders` WHERE `id` ='$id' " );
    }

}
