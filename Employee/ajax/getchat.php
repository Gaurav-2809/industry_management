<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("messagetoken",$_POST['token']))
{
    $message=test_input($_POST['message']);
    $from=$_SESSION['eid'];
    $to=$_SESSION['eid2'];
   $date = date_default_timezone_set('Asia/Kolkata');
    $today = date("g:i a");;
    if($message!="")
    {
        $query=$db->prepare("INSERT INTO message(from1,to1,message,time1) VALUES (?,?,?,?)");
        
        $data=array($from,$to,$message,$today);
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
