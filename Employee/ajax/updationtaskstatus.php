<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("donetoken",$_POST['token']))
{
    $id=test_input($_POST['id']);
    $date2=test_input($_POST['date2']);
    $rating='0';
        $query1=$db->prepare("UPDATE `addtask` SET `status`='2', `donedate`='$date2' WHERE employee=? AND rating=?; ");
        $data1=array($id,$rating); 
        $execute1=$query1->execute($data1);
        $query = $db->prepare('SELECT * FROM addemployee JOIN addtask ON addemployee.eid=addtask.employee where eid=?;');
        $data = array($id);
        $execute = $query->execute($data);
        while ($datarow = $query->fetch()) {
            $date1 = strtotime($datarow['deadline']);
            $date2 = strtotime($datarow['assigndate']);
            $date3 = strtotime($datarow['donedate']);
            $date4 = ($date3 - $date2) / 60 / 60 / 24;
            $date5 = ($date1 - $date2) / 60 / 60 / 24;
            // echo $date4;
            // echo $date5;
        }
        if($execute1 )
        {   
            // echo 0;
            
                if ($date4<$date5) {
                    $rating2='5';
                    $rating1='2';
                    $query1=$db->prepare("UPDATE `addtask` SET `status`='3', `rating`='$rating2' WHERE employee=? AND `status`=?; ");
                    $data1=array($id,$rating1); 
                    $execute1=$query1->execute($data1);
                    if($execute1 )
                    {   
                        echo 0;
                    }
                } else{
                    $rating3='2';
                    $rating1='2';
                    $query1=$db->prepare("UPDATE `addtask` SET `status`='3', `rating`='$rating3' WHERE employee=? AND `status`=?; ");
                    $data1=array($id,$rating1); 
                    $execute1=$query1->execute($data1);
                    if($execute1 )
                    {   
                        echo 0;
                    }
                
            }
            
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