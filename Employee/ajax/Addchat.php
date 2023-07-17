<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("chattoken",$_POST['token']))
{
    $department=test_input($_POST['department']);
    $eid1=test_input($_POST['eid1']);
    $employee=test_input($_POST['eid2']);
    $_SESSION['eid2'] = $employee;
    echo 0;

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
