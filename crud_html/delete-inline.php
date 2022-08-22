<?php

    if( isset( $_POST['deletebtn'] ) ){
        require "database/db.php";
        $sid = mysqli_real_escape_string( connect(), $_POST['sid'] );
        $condition = [ 'studentId' => $sid ];
        
        $result = deleteData( 'studentdetails',  $condition );
        header( "Location: http://localhost/OOP/crud_html/index.php" );
    }

    if( isset($_GET['id']) ){
        require "database/db.php";
        $sid = mysqli_real_escape_string( connect(), $_GET['id'] );
        $condition = [ 'studentId' => $sid ];
        
        $result = deleteData( 'studentdetails',  $condition );
        header( "Location: http://localhost/OOP/crud_html/index.php" );
    }

?>