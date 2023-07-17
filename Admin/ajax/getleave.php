<?php
include('connection1.php');
session_start();
if (isset($_POST['token']) && password_verify("getleave", $_POST['token'])) {
    // $eid=$_POST['eid'];

    $query = $db->prepare('SELECT * FROM addemployee JOIN leaveapplied ON addemployee.eid=leaveapplied.employee JOIN addleave ON leaveapplied.employee=addleave.lid JOIN department ON department.id=addemployee.department; ');
    $data = array();
    $execute = $query->execute($data);
?>
    <table class="table table-striped table-bordered table-dark">
        <tr>
            <td>Sr.no</td>
            <td>Name</td>
            <td>Email</td>
            <td>Department</td>
            <td>Leave type</td>
            <td>Approved</td>
            <td>Reject</td>
        </tr>
        <?php
        $Srno = 1;
        while ($datarow = $query->fetch()) {
        ?>
            <tr>
            <?php $hello=$datarow['status']; 
            if($hello==1){
            ?>
                <td><?php echo $Srno ?></td>
                <td><?php echo $datarow['ename'] ?></td>
                <td><?php echo $datarow['email'] ?></td>
                <td><?php echo $datarow['department'] ?></td>
                <td><?php echo $datarow['ltype'] ?></td>
                <td><button class="btn btn-success" onclick="approve(this.value);" value="<?php echo $datarow['eid'] ?>">Approve</button></td>
                <td><button class="btn btn-danger" onclick="reject(this.value);" value="<?php echo $datarow['eid'] ?>">Reject</button></td>
            </tr>
    <?php
            }
            $Srno++;
        }
    }
    ?>