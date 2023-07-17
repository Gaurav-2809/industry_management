<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/Admin.css">
</head>

<body>
    <div class="onesection">
        <div class="col-sm-12" style="width: 100%; float:left">
            <div class="col-sm-3">
                <div class="box">
                    <div class="box1">
                        <div class="icon1">
                            <i class="fa fa-bars" aria-hidden="true" onclick="openNav()"></i>
                        </div><br>
                        <a href="EmployeeDashboard.php">Home</a> / Apply Leave<br>
                        <div class="admin">
                            Employee Dashboard
                        </div>
                    </div>
                </div>
                <div class="box" data-aos="zoom-in">
                    <div class="box2">
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
                        <a href="AdminDashboard.php">Home</a> / Dashboard<br>
                        <div class="admin">
                            Employee Dashboard
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-3">
                        <div class="box4"  data-aos="fade-left">
                            <div class="admin">
                                <i class='fas fa-users' style='font-size:24px; color: mediumpurple;'></i> <br>
                                <div class="content">Employees
                                    <?php
                                    $connection = mysqli_connect("localhost", "root", "", "project");
                                    $query = 'SELECT eid FROM addemployee ORDER BY eid;';
                                    $run = mysqli_query($connection, $query);
                                    $row = mysqli_num_rows($run);

                                    echo $row;
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="box4" data-aos="fade-left">
                            <div class="admin">
                                <i class="fa fa-shopping-bag" aria-hidden="true" style='font-size:24px; color: red;'></i><br>
                                <div class="content">Leaves
                                    <?php
                                    $connection = mysqli_connect("localhost", "root", "", "project");
                                    $query = 'SELECT id FROM leaveapplied ORDER BY id;';
                                    $run = mysqli_query($connection, $query);
                                    $row = mysqli_num_rows($run);

                                    echo "  " . $row;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="box4" data-aos="fade-left">
                            <div class="admin">
                                <i class="fas fa-building" style='font-size:24px; color: yellow;'></i><br>
                                <div class="content">Department
                                    <?php
                                    $connection = mysqli_connect("localhost", "root", "", "project");
                                    $query = 'SELECT id FROM department ORDER BY id;';
                                    $run = mysqli_query($connection, $query);
                                    $row = mysqli_num_rows($run);

                                    echo "  " . $row;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="box4" data-aos="fade-left">
                            <div class="admin">
                                <i class="fa fa-money" style='font-size: 24px; color: darkgreen;'></i><br>
                                <div class="counter">Salary 350000</div>
                            </div>
                        </div>
                    </div>
                    <!-- <form enctype="multipart/form-data" action="insertimage.php" method="post" name="changer">
                        <input name="image" accept="image/jpg" type="file">
                        <input value="Submit" type="submit">
                    </form>  -->
                </div>
                <div class="col-sm-12">
                    <div class='col-sm-2'></div>
                    <div class='col-sm-8'>
                        <div class="form1" data-aos="zoom-in-down" style="border-radius: 5%;">
                            <form>
                                <div class="form3 show" id="form3">
                                    <label for="leave">LEAVE TYPE:</label><br>
                                    <select name="list3" id="list3" class="form-control">
                                        <option value="0">SELECT LEAVE TYPE</option>
                                    </select><br>
                                    <label for="rname">REASON FOR LEAVE APPLIED:</label><br>
                                    <textarea class="form-control" name="tname" id="rname"></textarea><br>
                                    <label for="leave">LEAVE APPLIED FROM DATE:</label><br>
                                    <input type="date" placeholder="Enter date" class="form-control" name="leave" id="fdate"><br>
                                    <label for="leave">LEAVE APPLIED TO DATE:</label><br>
                                    <input type="date" placeholder="Enter date" class="form-control" name="leave" id="tdate"><br>
                                    <div class="button1">
                                        <button class="btn1" onclick="Leaveapplied();">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class='col-sm-2'></div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    var dt = new Date();
    document.getElementById("date").innerHTML = dt.toLocaleDateString('en-us', {
        weekday: "long",
        year: "numeric",
        month: "short",
        day: "numeric"
    });

    function openNav() {
        document.getElementById("myNav").style.width = "100%";
    }

    /* Close when someone clicks on the "x" symbol inside the overlay */
    function closeNav() {
        document.getElementById("myNav").style.width = "0%";
    }

    function Leaveapplied() {
        var ltype = document.getElementById('list3').value;
        var rname = document.getElementById('rname').value;
        var fdate = document.getElementById('fdate').value;
        var tdate = document.getElementById('tdate').value;
        var token = "<?php echo password_hash("leavetoken", PASSWORD_DEFAULT); ?>"
        if (ltype !== "" && rname !== "" && fdate !== "" && tdate !== "") {
            $.ajax({
                type: 'POST',
                url: "ajax/leaveapplied.php",
                data: {
                    ltype: ltype,
                    rname: rname,
                    fdate: fdate,
                    tdate: tdate,
                    token: token
                },
                success: function(data) {
                    if (data == 0) {
                        alert('Leave applied successfully');
                        window.location.reload();
                    }
                }
            });
        } else {
            alert('please fill all details');
        }
    }

    getleave();

    function getleave() {
        var token = "<?php echo password_hash("getleave", PASSWORD_DEFAULT); ?>"
        $.ajax({
            type: 'POST',
            url: "ajax/getleave.php",
            data: {
                token: token
            },
            success: function(data) {
                $('#list3').html(data);
            }
        });
    }
</script>
<script type=text/javascript>
    $('form').submit(function(e) {
        e.preventDefault();
    });
</script>
<script>
  AOS.init({
    once: true,
    duration: 1200,
  });
</script>
</html>