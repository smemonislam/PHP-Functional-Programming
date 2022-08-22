<?php
    if( isset( $_POST['update'] ) ){
        require 'database/db.php';
        $sid        = mysqli_real_escape_string( connect(), $_POST['sid'] );
        $sname      = mysqli_real_escape_string( connect(), $_POST['sname'] );
        $saddress   = mysqli_real_escape_string( connect(), $_POST['saddress'] );
        $sclass     = mysqli_real_escape_string( connect(), $_POST['sclass'] );
        $sphone     = mysqli_real_escape_string( connect(), $_POST['sphone'] );


        $condition_arr = [
            'studentName'           => $sname,
            'studentAddress'        => $saddress,
            'studentClassName'      => $sclass,
            'studentPhoneNumber'    => $sphone,
        ];
        $result = updateData( 'studentdetails', $condition_arr, 'studentId', $sid );
        header( "Location: http://localhost/OOP/crud_html/index.php" );
    }
?>