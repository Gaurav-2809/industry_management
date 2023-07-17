<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="normalize.min.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
	<section>
		<div class="col-sm-12">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="logo">
                    <h1 style="text-align: center; padding-top: 0px; font-size: 40px;"><b><u>Industry management system</u></b></h1>
					<img src="quiz1.png" style="width:100%; font-size: medium;">
				</div>
			</div>
			<div class="col-sm-3"></div>
	    </div>
	</section>
	<section>
        <div class="container">
            <div class="col-sm-12">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-4">
                    <div class="Box">
                    	<div class="heading">
                    		<i class="fa fa-user" aria-hidden="true"></i>
                    		<h3><b>Admin login</b></h3>
                    		<p>
                    			Login with your UID and Password to access your Admin Services and Account. The account will keep a record of your progress and keep you apprised of the latest updates.
                    		</p>
                    	</div>
                        <a href="\MegaProject1\Admin\adminlogin.php"><button class="btn"> Login</button></a>
                    </div>
                </div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-4">
                    <div class="Box">
                    	<div class="heading">
                    		<i class="fas fa-chalkboard-teacher"></i>
                    		<h3><b>Employee login</b></h3>
                    		<p>
                    			Login with your UID and Password to access your Employee Services and Account. The account will keep a record of your progress and keep you apprised of the latest updates.
                    		</p>                    		
                    	</div>
                    	<a href="\MegaProject1\Employee\employeelogin.php"><button class="btn"> Login</button></a>
                    </div>
                </div>
                <div class="col-sm-3">
                </div>
            </div>
        </div>
    </section>
</body>
</html>
