<?php
header( 'Content-type: application/json' );

require_once "../../vendor/autoload.php";

use App\classes\Slider;

$slider = new Slider();
$data   = ['error' => false];

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