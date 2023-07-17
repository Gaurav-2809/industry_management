<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("deltoken",$_POST['token']))
{
    $id=test_input($_POST['id']);
        $query=$db->prepare("DELETE FROM `leaveapplied` WHERE employee=?");
        $data=array($id);
        $execute=$query->execute($data);
        if($execute)
        {
            echo 0;
        }
        else{
            echo"something went wrong";
        }
    
}
else{
    echo "server error";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>