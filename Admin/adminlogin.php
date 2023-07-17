<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet"  href="css/admin1.css">
</head>


<body>
    <section>
        <div class="col-sm-12">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <div class="form">                
                <div class="form" id="login">                  
                    <form>
                        <h3 style="text-align: center; margin-top:5px;"><b>ADMIN LOGIN</b></h3><hr>
                        <img src="css/quiz1.png" style="max-width:100%; height: auto; height: 180px;width: 370px;  display: block; margin-left: auto; margin-right: auto; margin-bottom: 20px;">
                        <div class="form_fiels">
                            <label for=email>Email:</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="enter your email"><br>
                            <label for=password>Password:</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="enter your password">  
                            <input type="checkbox" onclick="Toggle()"> <b>Show Password</b>       
                        </div>
                        <div class="submit_btn">
                            <button type="submit" onclick="sendlogin();" class="btn">Login</button>   
                        </div>                   
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
            </div>
            
</div>
    </section>

    <script>

        function Toggle()
        {
            var temp = document.getElementById("password");
            if (temp.type === "password") {
                temp.type = "text";
            }
            else {
                temp.type = "password";
            }
        }

    function sendlogin()
    {
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var token = "<?php echo password_hash("logintoken",PASSWORD_DEFAULT);?>";
        if(email!="" && password!="")
        {
            $.ajax(
            {
                type:'POST',
                url:"ajax/login.php",
                data:{email:email,password:password,token:token},
                success:function(data)
                {
                    if(data == 0)
                    {
                        alert("login successful")
                        window.location="AdminDashboard.php";
                    }
                    else
                    {
                        alert(data)
                    }
                }
            });
        }
        else
        {
            alert('fill all the fields');
        }
    }
    

</script>
<script type="text/javascript">
$('form').submit(function(e){
    e.preventDefault();
});
</script>


</body>

</html>