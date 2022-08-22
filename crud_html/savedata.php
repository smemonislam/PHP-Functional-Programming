<?php
    if( isset( $_POST['submit'] ) ){
        require 'database/db.php';
        $sname      = mysqli_real_escape_string( connect(), $_POST['sname'] );
        $saddress   = mysqli_real_escape_string( connect(), $_POST['saddress'] );
        $class      = mysqli_real_escape_string( connect(), $_POST['class'] );
        $sphone     = mysqli_real_escape_string( connect(), $_POST['sphone'] );


        $condition_arr = [
            'studentName'           => $sname,
            'studentAddress'        => $saddress,
            'studentClassName'      => $class,
            'studentPhoneNumber'    => $sphone,
        ];
        $result = insertData( 'studentdetails', $condition_arr );
        header( "Location: http://localhost/OOP/crud_html/index.php" );
    }
?>