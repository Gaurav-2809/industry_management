<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("leavetoken",$_POST['token']))
{
    $ltype=test_input($_POST['ltype']);
    $rname=test_input($_POST['rname']);
    $fdate=test_input($_POST['fdate']);
    $tdate=test_input($_POST['tdate']);
    $status="1";

    if($rname!="")
    {
        $query=$db->prepare("INSERT INTO leaveapplied(employee,ltype,rname,fdate,tdate,status) VALUES (?,?,?,?,?,?)");
        
        $data=array($_SESSION['eid'],$ltype,$rname,$fdate,$tdate,$status);
        $execute=$query->execute($data);
        if($execute)
        {
            echo 0;
        }
        else{
            echo"something went wrong";
        }
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
