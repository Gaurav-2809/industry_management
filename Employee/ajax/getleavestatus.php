<?php
include('connection1.php');
session_start();
if (isset($_POST['token']) && password_verify("getstatus", $_POST['token'])) {
    $id = $_POST['eid'];
    $query = $db->prepare('SELECT * FROM addemployee JOIN leaveapplied ON addemployee.eid=leaveapplied.employee where eid=?;');

    $data = array($id);

    $execute = $query->execute($data);
?>
    <table id="table1" class="table tabel-hover table-bordered">
        <tr>
            <td>SR. NO.</td>
            <td>EMPLOYEE NAME</td>
            <td>STATUS</td>
        </tr>
        <?php
        $srno = 1;
        while ($datarow = $query->fetch()) {
        ?>
        <?php $hello=$datarow['status']; 
        if($hello==2){ 
        ?>
            <tr>
                <td><?php echo $srno ?></td>
                <td><?php echo $datarow['ename'] ?></td>
                <td><?php echo $message="Your Leave Has Been Approved Successfully"; ?></td>
                <td><button onclick="OK(this.value);" class="btn btn-primary" value="<?php echo $datarow['eid'] ?>">OK</button></td>
            </tr>
        <?php
            }
            else if($hello==3){ 
                ?>
                    <tr>
                        <td><?php echo $srno ?></td>
                        <td><?php echo $datarow['ename'] ?></td>
                        <td><?php echo $message="Your Leave Has Been Rejected"; ?></td>
                        <td><button onclick="OK(this.value);" class="btn btn-primary" value="<?php echo $datarow['eid'] ?>">OK</button></td>
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