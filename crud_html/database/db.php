<?php
    function connect(){
        $hostname   = 'localhost';
        $username   = 'root';
        $password   = '';
        $dbname     = 'student';

        $conn = mysqli_connect( $hostname, $username, $password, $dbname );
        return $conn;
    }

    function getData( $table = '', $join_table = '', $field = '*', $condition_arr = '', $order_by_field = '', $order_by_type = 'DESC', $limit = '' ){
        $sql = "SELECT {$field} FROM {$table}";
        if( $join_table != '' ){
            $sql .= " JOIN {$join_table} ON {$table}.studentClassName = {$join_table}.classId ";
        }   
        if( $condition_arr != '' ){
            $sql .= " WHERE ";
            $count = count( $condition_arr );
            $total_count = 1;
            foreach( $condition_arr as $key => $value ){
                if( $total_count ==  $count ){
                    $sql .= " {$key} =  $value ";                    
                }else{
                    $sql .= " {$key} =  $value AND";
                }
                $total_count++;
            }
        }
        if( $order_by_field != '' ){
            $sql .= " ORDER BY {$order_by_field} {$order_by_type}";
        }
        if( $limit != '' ){
            $sql .= " LIMIT {$limit}";
        }
        $result = mysqli_query( connect(), $sql );

        if( mysqli_num_rows( $result ) > 0 ){
            $data = array();
            while($row = mysqli_fetch_assoc( $result )){
                $data[] = $row;
            }
        }
        return $data;

    }

    function insertData( $table, $condition_arr = '' ){
        if( $condition_arr != '' ){
            $fieldkey   = array();
            $fieldvalue = array();
            foreach( $condition_arr as $key => $value ){
                $fieldkey[] = $key;
                $fieldvalue[] = $value;
            }
            $field = implode( ",", $fieldkey );
            $value = implode( "','", $fieldvalue );
            $value = "'$value'";

            $sql = "INSERT INTO {$table}( $field ) VALUES( $value )";
            mysqli_query( connect(), $sql );
        }
    }

    function updateData( $table, $condition_arr = '', $field_type = '', $field_value = '' ){
        if( $condition_arr != '' ){
            $sql = "UPDATE $table SET ";
            if( $condition_arr != '' ){
                $count = count( $condition_arr );
                $total_count = 1;
                foreach( $condition_arr as $key => $value ){
                    if( $total_count ==  $count ){
                        $sql .= " {$key} =  '{$value}' ";                    
                    }else{
                        $sql .= " {$key} =  '{$value}',";
                    }
                    $total_count++;
                }
            }
            $sql .= " WHERE {$field_type} = {$field_value}";
            mysqli_query( connect(), $sql );
        }
    }

    function deleteData( $table, $condition_arr ){
        if( $condition_arr != '' ){
            $sql = "DELETE FROM {$table} WHERE ";
            $count = count( $condition_arr );
            $total_count = 1;
            foreach( $condition_arr as $key => $value ){
                if( $total_count ==  $count ){
                    $sql .= " {$key} =  '{$value}' ";                    
                }else{
                    $sql .= " {$key} =  '{$value}' AND ";
                }
                $total_count++;
            }
            mysqli_query( connect(), $sql );
        }
    }
?>