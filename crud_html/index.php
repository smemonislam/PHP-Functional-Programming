<?php
    include 'header.php';
    require 'database/db.php';
    $row = getData( 'studentdetails', 'studentclassname', '*', '', 'studentId' );
?>
<div id="main-content">
    <h2>All Records</h2>
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php foreach( $row as $data ){ ?>
            <tr>
                <td><?php echo $data['studentId']; ?></td>
                <td><?php echo $data['studentName']?></td>
                <td><?php echo $data['studentAddress']; ?></td>
                <td><?php echo $data['className']; ?></td>
                <td><?php echo $data['studentPhoneNumber']; ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $data['studentId']; ?>'>Edit</a>
                    <a href='delete-inline.php?id=<?php echo $data['studentId']; ?>'>Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>
