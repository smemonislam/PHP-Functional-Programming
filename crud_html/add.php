<?php 
    include 'header.php'; 
    require 'database/db.php';
?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="class">
                <option value="" selected disabled>Select Class</option>
                <?php
                    $row1 = getData( 'studentclassname' );
                    foreach( $row1 as $data1  ){
                        echo '<option value="'.$data1['classId'].'">'. $data1['className'] .'</option>';
                    }
                ?>  
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" />
        </div>
        <input class="submit" type="submit" value="Save" name="submit" />
    </form>
</div>
</div>
</body>
</html>
