<?php

namespace App\Classes;
use mysqli;

class Config {
    /**
     * @var mixed
     */
    public $conn;
    public function __construct() {
        $this->conn = new mysqli( 'localhost', 'root', '', 'oop-project1' );

        if ( $this->conn->connect_error ) {
            die( $this->conn->connect_error );
        }
    }

    /**
     * @return mixed
     */
    public function showMessage( $type, $message ) {
        $output = <<<MARKUP
        <div class="alert alert-$type alert-dismissible fade show" role="alert">
            $message
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        MARKUP;
        return $output;
    }
}
