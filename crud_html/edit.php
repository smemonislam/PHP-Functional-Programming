<?php 
    include 'header.php'; 
    require "database/db.php";
    if( isset( $_GET['id'] ) ){
        $getId = $_GET['id'];
    }
    $condition_arr = [ 'studentId' => $getId ];
    $row = getData( 'studentdetails', '', '*', $condition_arr );
?>

<div id="main-content">
    <h2>Update Record</h2>
    <form class="post-form" action="updatedata.php" method="post">
      <div class="form-group">
          <label>Name</label>
          <input type="hidden" name="sid" value="<?php echo $row[0]['studentId']; ?>"/>
          <input type="text" name="sname" value="<?php echo $row[0]['studentName']; ?>"/>
      </div>
      <div class="form-group">
          <label>Address</label>
          <input type="text" name="saddress" value="<?php echo $row[0]['studentAddress']; ?>"/>
      </div>
      <div class="form-group">
          <label>Class</label>
          <select name="sclass">
              <option value="" selected disabled>Select Class</option>
              <?php
                $row1 = getData( 'studentclassname' );
                foreach( $row1 as $data1  ){
                    if( $row[0]['studentClassName'] == $data1['classId'] ){
                        $selected = 'selected';
                    }else{
                        $selected = '';
                    }
                    echo '<option value="'.$data1['classId'].'" '.$selected.'>'. $data1['className'] .'</option>';
                }
              
              ?>              
          </select>
      </div>
      <div class="form-group">
          <label>Phone</label>
          <input type="text" name="sphone" value="<?php echo $row[0]['studentPhoneNumber']; ?>"/>
      </div>
      <input class="submit" type="submit" value="Update" name="update"/>
    </form>
</div>
</div>
</body>
</html>
