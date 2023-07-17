<?php
include('connection1.php');
session_start();
if (isset($_POST['token']) && password_verify("gettask", $_POST['token'])) {
    $eid=$_POST['eid'];
    $query = $db->prepare('SELECT * FROM addemployee JOIN addtask ON addemployee.eid=addtask.employee JOIN tasktype ON tasktype.id=addtask.type where eid=?;');

    $data = array($eid);

    $execute = $query->execute($data);
?>
    <!-- <input type="date" id="date2" class="form-control"> -->
    <table id="table1" class="table table-hover table-bordered">
        <tr>
            <td>SR. NO.</td>
            <td>EMPLOYEE NAME</td>
            <td>TASK</td>
            <td>TYPE</td>
            <td>STATUS</td>
        </tr>
        <?php
        $srno = 1;
        while ($datarow = $query->fetch()) {

        ?>
            <?php $hello= $datarow['status']; 
            
            if($hello==1){ 
            ?>
            <tr>
                <td><?php echo $srno ?></td>
                <td><?php echo $datarow['ename'] ?></td>
                <td><?php echo $datarow['tasktype'] ?></td>
                <td><?php echo $datarow['brief'] ?></td>
                <td><button onclick="done(this.value);" class="btn btn-primary" value="<?php echo $datarow['eid']?>">Done</button></td>
            </tr>
        <?php
            }    
            $srno++;
        }
        ?>
    </table>
<?php
}
?>