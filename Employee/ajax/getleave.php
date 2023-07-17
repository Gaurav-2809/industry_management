<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("getleave",$_POST['token']))
{
    $query=$db->prepare('SELECT * FROM addleave; ');
    $data=array();
    $execute=$query->execute($data);
?>
<select name="ltype" id="ltype" class="form-control">
    <option value="0">Select leave type</option>

    <?php
        while($datarow=$query->fetch())
        {
    ?>
    <option value="<?php echo $datarow['lid'];?>"><?php echo $datarow['ltype'];?></option>
    <?php } ?>
</select>
<?php

    }

?>