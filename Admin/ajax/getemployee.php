<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("getemployee",$_POST['token']))
{
        $did =$_POST['did'];

        $query=$db->prepare('SELECT * FROM addemployee WHERE department = ?');

        $data=array($did);

        $execute=$query->execute($data);
?>
<select name="class" id="class" class="form-control">
<option value="0">Choose Employee</option>
    <?php
        while($datarow=$query->fetch())
        {
    ?>
    <option value="<?php echo $datarow['eid'];?>"><?php echo $datarow['ename']?></option>
    <?php } ?>
</select>
<?php

    }
    

?>