<?php
header( 'Content-type: application/json' );

require_once "../../vendor/autoload.php";

use App\classes\Slider;
use App\classes\WorkMenu;

$slider   = new Slider();
$workmenu = new WorkMenu();
$data     = ['error' => false];

// save slider
if ( isset( $_POST['action'] ) && $_POST['action'] === 'save-slider' ) {
    $title      = $_POST['title'];
    $sub_title  = $_POST['sub_title'];
    $start_date = $_POST['start_date'];
    $end_date   = $_POST['end_date'];
    $url_1      = $_POST['url_1'];
    $status     = $_POST['status'];

    $image   = $_FILES['image']['name'];
    $image   = explode( '.', $image );
    $imageEx = end( $image );
    $image   = uniqid() . rand( 22222, 99999 ) . '.' . $imageEx;

    if ( $slider->saveSlider( $title, $sub_title, $start_date, $end_date, $url_1, $status, $image ) ) {
        move_uploaded_file( $_FILES['image']['tmp_name'], '../../uploads/slider/' . $image );
        $data['message'] = "Slider has been saved.";
    } else {
        $data['error']   = true;
        $data['message'] = "Slider not saved.";
    }

    echo json_encode( $data );

}

// update slider
if ( isset( $_POST['action'] ) && $_POST['action'] === 'update-slider' ) {
    $id         = $_POST['id'];
    $title      = $_POST['title'];
    $sub_title  = $_POST['sub_title'];
    $start_date = $_POST['start_date'];
    $end_date   = $_POST['end_date'];
    $url_1      = $_POST['url_1'];
    $status     = $_POST['status'];
    $old_image  = $_POST['old_image'];

    if ( $_FILES['image']['name'] ) {
        $image   = $_FILES['image']['name'];
        $image   = explode( '.', $image );
        $imageEx = end( $image );
        $image   = uniqid() . rand( 22222, 99999 ) . '.' . $imageEx;
    } else {
        $image = $old_image;
    }

    if ( $slider->updateSlider( $id, $title, $sub_title, $start_date, $end_date, $url_1, $status, $image ) ) {

        if ( $image !== $old_image ) {
            move_uploaded_file( $_FILES['image']['tmp_name'], '../../uploads/slider/' . $image );
            $img_old = '../../uploads/slider/' . $old_image;
            file_exists( $img_old ) ? unlink( $img_old ) : '';
        }

        $data['message'] = "Slider has been updated.";
    } else {
        $data['error']   = true;
        $data['message'] = "Slider not updated.";
    }

    echo json_encode( $data );

}

// update status
if ( isset( $_POST['action'] ) && $_POST['action'] === 'update-status' ) {
    $id     = $_POST['id'];
    $result = $slider->GetSlider( $id );
    $row    = $result->fetch_assoc();
    $status = $row['status'] == 1 ? 0 : 1;

    if ( $slider->changeStatus( $id, $status ) ) {
        $data['status']  = $status;
        $data['message'] = 'Slider status has been updated!';
    } else {
        $data['error']   = true;
        $data['message'] = 'Slider status not updated!';
    }

    echo json_encode( $data );
}

// delete slider
if ( isset( $_POST['action'] ) && $_POST['action'] === 'delete-slider' ) {

    $id     = $_POST['id'];
    $result = $slider->GetSlider( $id );
    $row    = $result->fetch_assoc();

    if ( $slider->Delete( $id ) ) {

        $img_file = '../../uploads/slider/' . $row['image'];
        file_exists( $img_file ) ? unlink( $img_file ) : '';

        $data['message'] = "Slider has been deleted!";
    } else {
        $data['error']   = true;
        $data['message'] = "Slider not deleted!";
    }

    echo json_encode( $data );
}

// save work menu
if ( isset( $_POST['action'] ) && $_POST['action'] === 'save-work-menu' ) {
    $name   = $_POST['name'];
    $status = $_POST['status'];

    if ( $workmenu->saveWorkMenu( $name, $status ) ) {
        $data['message'] = "Work Menu has been saved.";
    } else {
        $data['error']   = true;
        $data['message'] = "Work menu not saved.";
    }

    echo json_encode( $data );

}