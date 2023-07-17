<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <a href="AdminDashboard.php">Home</a> / Task Assign<br>
                        <div class="admin">
                            Admin Dashboard
                        </div>
                    </div>
                </div>
                <div class="box" data-aos="zoom-in">
                    <div class="box2">
                        <div class="icon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="welcome">
                            Welcome Admin
                        </div>
                        <div class="date">
                            <p id="date"></p>
                        </div>
                        <div class="navbar">
                    <ul>
                        <li>
                            <a href="AdminDashboard.php" id="btn3">Home</a>
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
                            <a href="AddEmployee.php">Add Employee</a>
                            <a href="TaskAssign.php">Task Assign</a>
                            <a href="LeaveStatus.php">Leave Status</a>
                        </div>
                </div>
                
            </div>
            <div class="col-sm-9">
                <div class="box">
                    <div class="box3" style="width: 100%;">
                        <a href="AdminDashboard.php">Home</a> / Task Assign<br>
                        <div class="admin">
                            Admin Dashboard
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
                <div class ="col-sm-12">
                    <div class='col-sm-2'></div>
                    <div class='col-sm-8'>
                         <div class="form1" data-aos="zoom-in-down" style="border-radius: 5%;">
                     <form>
                        <div class="form3 show" id="form3">
                            <div class="form-group">
                                <label for="department">Choose Department</label><br>
                                <select name="department1" id="department1" class="form-control" onchange="getemployee();">
                                    <option value="0">Choose Department</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="employee">Choose Employee</label><br>
                                <select name="employee1" id="employee1" class="form-control">
                                    <option value="0">Choose Employee</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="task">Choose Type</label><br>
                                <select name="type" id="type" class="form-control">
                                    <option value="0">Choose Type</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="task">Deadline Date</label><br>
                                <input type="date" class="form-control" id="date1" name="date1">
                            </div>
                            <div class="form-group">
                                <label for="brief">Brief Details</label><br>
                                <textarea name="brief" id="brief" cols="60" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="button1">
                                <button class="btn1" onclick="TaskAssign();">SUBMIT</button>
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
    document.getElementById("date").innerHTML = dt.toLocaleDateString('en-us', {weekday:"long", year:"numeric", month:"short", day:"numeric"});
    function TaskAssign() {
        var department1 = document.getElementById('department1').value;
        var employee1 = document.getElementById('employee1').value;
        var type = document.getElementById('type').value;
        var brief = document.getElementById('brief').value;
        var date1 = document.getElementById('date1').value;
        var token = "<?php echo password_hash("tasktoken", PASSWORD_DEFAULT); ?>"
        if (department1 !== "0" && employee1 !== "0" && type != "0" && brief != "" && date1 != "" ) {
            $.ajax({
                type: 'POST',
                url: "ajax/TaskAssign.php",
                data: {
                    department1:department1,
                    employee1:employee1,
                    type:type,
                    brief:brief,
                    date1:date1,
                    token: token
                },
                success: function(data) {
                    if (data == 0) {
                        alert('Task Assign successfully');
                        window.location.reload();
                    }
                    // alert(data);
                }
            });
        } else {
            alert('please fill all details');
        }
    }

    getdepartment();
    function getdepartment() {
        var token = "<?php echo password_hash("getdepartment", PASSWORD_DEFAULT); ?>"

        $.ajax({
            type: 'POST',
            url: "ajax/getdepartment1.php",
            data: {
                token: token
            },
            success: function(data) {
                // $('#list').html(data);
                $('#department1').html(data);
            }
        });
    }
    gettasktype();
    function gettasktype() {
        var token = "<?php echo password_hash("gettasktype", PASSWORD_DEFAULT); ?>"

        $.ajax({
            type: 'POST',
            url: "ajax/gettasktype.php",
            data: {
                token: token
            },
            success: function(data) {
                // $('#list').html(data);
                $('#type').html(data);
            }
        });
    }

    function getemployee() {
        var did = document.getElementById('department1').value;
        var token = "<?php echo password_hash("getemployee", PASSWORD_DEFAULT); ?>";
        $.ajax({
            type: 'POST',
            url: "ajax/getemployee.php",
            data: {
                did: did,
                token: token
            },
            success: function(data) {
                $('#employee1').html(data);
            }
        });
    }

     function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
  document.getElementById("myNav").style.width = "0%";
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