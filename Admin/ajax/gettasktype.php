<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("gettasktype", $_POST['token']))
{
        $query=$db->prepare('SELECT * FROM tasktype');

        $data=array();

        $execute=$query->execute($data);
?>
<select name="type" id="type" class="form-control">
    <option value="0">Choose Type</option>
    <?php
        while($datarow=$query->fetch())
        {
    ?>
    <option value="<?php echo $datarow['id'];?>"><?php echo $datarow['tasktype']?></option>
    <?php } ?>
</select>
<?php

    }

?>
   