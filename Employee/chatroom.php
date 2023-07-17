<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatroom</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/chat.css">
    <link rel="stylesheet" href="css/Admin.css">
</head>
<body>
    <div class="onesection">
        <div class="col-sm-12" style="width: 100%; float:left">
            <div class="col-sm-3">
                <div class="box">
                    <div class="box1" >
                        <div class="icon1">
                            <i class="fa fa-bars" aria-hidden="true" onclick="openNav()"></i>
                        </div><br>
                        <a href="AdminDashboard.php">Home</a> / Chatting<br>
                        <div class="admin">
                            Chatting Dashboard
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box2" data-aos="zoom-in">
                        <div class="icon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="welcome">
                             Welcome <br><?php echo $_SESSION['ename']; ?>
                        </div>
                        <div class="date">
                            <p id="date"></p>
                        </div>
                        <div class="navbar">
                    <ul>
                        <li>
                            <a href="EmployeeDashboard.php" id="btn3">Home</a>
                        </li>
                         <li>
                            <a href="chatting.php" id="btn3">Chatting</a>
                        </li>
                        <!-- <li>
                            <a onclick="openNav()" id="btn1">Menu </a>
                        </li> -->
                        <li>
                            <a href="Logout.php" id="btn3">Logout</a>
                        </li>
                    </ul>
                </div>
                    </div>
                </div>
                <div id="myNav" class="overlay">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                        <div class="overlay-content">
                            <a href="leaveapplied.php">Leave Apply</a>
                            <a href="leavestatus.php">Leave Status</a>
                            <a href="taskalloted.php">Task Alloted</a>
                        </div>
                </div>
                
            </div>
            <div class="col-sm-9">
                <div class="box">
                    <div class="box3" style="width: 100%;">
                        <a href="AdminDashboard.php">Home</a> / Chatting<br>
                        <div class="admin">
                            Chatting
                        </div>
                    </div>
                </div>
                <div class ="col-sm-12">
                    <div class='col-sm-2'></div>
                    <div class='col-sm-8'>
                        <div class="form1" style="background-color: black; height:450px; overflow-y: scroll;">
                            <div id="messagelist"></div>                                    
                         </div>
                    </div>
                    
                        <div class="input-group" style="padding-top: 20px; padding-bottom: 20px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-7">
                                <textarea type="text" placeholder="Enter message here" class="form-control" name="message" id="message" style="height: 5rem;"></textarea>
                            </div>
                            <div class="col-sm-1" style="padding: 0%;">
                                <button class="button1" onclick="sendmessage();"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            </div> 
                            <div class="col-sm-2"></div>                                  
                        </div>
                    
                    <div class='col-sm-2'></div>               
                </div>
            </div>
        </div>
    </div>





<script type="text/javascript">
    var dt = new Date();
    document.getElementById("date").innerHTML = dt.toLocaleDateString('en-us', {weekday:"long", year:"numeric", month:"short", day:"numeric"});

        function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}


    function sendmessage(){
    var message=document.getElementById("message").value;
    var token = "<?php echo password_hash("messagetoken", PASSWORD_DEFAULT); ?>";
    if (message !=="" ) {
        $.ajax({
            type:'POST',
            url:"ajax/getchat.php",
            data:{
                message:message,
                token:token
            },
            success: function(data){
              if(data==0){
                 window.location.reload();
              }
                
            }
        });
    }
    else{
        alert("Please type first.");
    }  
    }
    getmessage();
    function getmessage()
    {
        var token='<?php echo password_hash("getmessage", PASSWORD_DEFAULT);?>';

        $.ajax(
        {
            type:'POST',
            url:"ajax/getmessage.php",
            data:{token:token},
            success:function(data)
            {
                // alert(data);
                $('#messagelist').html(data);
                
            }                 
        });
    }
</script>

<script type=text/javascript>
 $('form').submit(function(e){
     e.preventDefault();
 });
</script>

</html>

