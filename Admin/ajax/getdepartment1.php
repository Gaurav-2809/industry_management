<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("getdepartment", $_POST['token']))
{
        $query=$db->prepare('SELECT * FROM department');

        $data=array();

        $execute=$query->execute($data);
?>
<select name="university" id="university" class="form-control" onchange="getemployee();">
    <option value="0">Choose Department</option>
    <?php
        while($datarow=$query->fetch())
        {
    ?>
    <option value="<?php echo $datarow['id'];?>"><?php echo $datarow['department']?></option>
    <?php } ?>
</select>
<?php

    }

?>
   