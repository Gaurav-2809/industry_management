<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("getmessage",$_POST['token']))
{

    $from=$_SESSION['eid'];
    $to=$_SESSION['eid2'];

        $query1=$db->prepare('SELECT * FROM message  WHERE (from1=? AND to1=?) OR (TO1 =?  AND FROM1 =?) ');
        $data1=array($from,$to,$from,$to);
        $execute1=$query1->execute($data1);

        while($datarow1=$query1->fetch() )
        { 
            $from=$_SESSION['eid'];
            $to=$_SESSION['eid2'];
            if($from==$datarow1['from1']){
           ?>
              <div class="container1 darker">
                <span class="time-right"><i class="fa fa-user" aria-hidden="true"></i><?php echo $_SESSION['ename']?> </span><br>
                  <p class="time-right" style="color: black;"><?php echo $datarow1['message']; ?></p>
                  
                  <span class="time-left"><?php echo $datarow1['time1'];?></span>
                </div>


        <?php
        }
        else{
            ?>
                <div class="container1">
                <span class="time-left"><i class="fa fa-user" aria-hidden="true"></i></span><br>
                  <p class="time-left" style="color: black;"><?php echo $datarow1['message']; ?></p>
                  
                  <span class="time-right"><?php echo $datarow1['time1'];?></span>
                </div>
            <?php
        }
        }
}
  ?>