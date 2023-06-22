<?php 
session_start();

  include("connection.php");
  include("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {

  	//something was posted
  	$user_name = $_POST['email'];
  	$password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $mobile = $_POST['mno'];


  	if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
  	{
  		//save to database
  		  $user_id = random_num(20);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query = "insert into users (user_id,email,password,fname,lname,address,mno) values ('$user_id','$user_name','$password','$fname','$lname','$address','$mobile')";

        mysqli_query($con,$query);
        header("Location: login.php");
        die;
  	}
  	else
  	{
  		echo "Please enter valid information";
  	}
  }  

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Sign Up</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <style type="text/css">
    *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body{
  font-family: 'Poppins', sans-serif;
  height: 100vh;
  width: 100vw;
   background-image: url('wall1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  display:flex;
  justify-content: center;
  align-items: center;
}

.footer 
{
  padding: 5px;
  text-align: center;
  color:white;
  font-size: 10px;
  margin-top: 18px;
    background-image: url('wall1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  
}

.card{
  background: #fff;
  width: 900px;
  min-height: 400px;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
  display: flex;


}
.norm,
.image{
  width: 50%;
}

.image{
background-image: url('wall.jpg');
background-size:cover;
background-position: center;
}

.overlay{
  width: 100%;
  height: 100%;
  background-color: rgba(114, 39, 213, 0.31);
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  text-align: center;
  
}

.overlay h3{
  color:white;
  letter-spacing: 1px;
  font-size: 25px;
  font-weight: 700;
  opacity: 0.6;
}
.overlay p{
  color:white;
  font-size: 13px;
  font-weight: bold;
   opacity: 0.6;
}


.norm{
  padding: 60px 25px; 
  display: flex;
  flex-direction: column;
}
.norm h3{
  font-size: 28px;
  font-weight: 500;
  position: relative;
  margin-bottom: 30px;
}
.norm h3::after{
  content: '';
  width:30px;
  height:3px;
  background: #7227D5;
  position: absolute;
  left: 0;
  bottom: 2px;
  border-radius: 5px;
}

.fa{
  color: #7227D5;
  position: absolute;
  top:10px;
  font-size: 18px;
}
    .input-field{
  width: 100%;
  margin-bottom: 10px;
  position: relative;
}
.input-field input{
  display: block; 
  width: 100%;
  padding: 10px 30px;
  outline: none;
  border:none;
  border-bottom: 2px solid rgb(182, 180, 180);
  font-size: 15px;
}

.norm>a{
  color:#7227D5;
  text-decoration: none;
  font-size: 14px;
  margin-bottom: 35px
}

.button{
  height: 45px;
  background:#7227D5;
  border:none;
  color:white;
  border-radius: 5px;
  font-size: 18px;
}
.button:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
.button+p{
  text-align: center;
  padding-top: 30px;
  font-size: 14px;
}

.button+p a{
  text-decoration: none;
  color:#7227D5;
  font-weight: 500;
}
textarea{
  resize: none;
  display: block; 
  width: 100%;
  padding: 10px 30px;
  outline: none;
  border:none;
  border-bottom: 2px solid rgb(182, 180, 180);
  font-size: 15px;
}

  </style>

 <form method="post">
       <div class="card" style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);">
          <div class="norm" style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);">
            <h3>Sign Up</h3>
              <div class="input-field">
                 <i class="fa fa-user-circle" style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);"></i>
                 <input type="text" placeholder="First name" name="fname">
              </div>
              <div class="input-field">
                 <i class="fa fa-user-circle-o" style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);"></i>
                 <input type="text" placeholder="Last name" name="lname">
              </div>
              <div class="input-field">
                  <i class="fa fa-address-card-o" style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);"></i>
                  <textarea type="text" placeholder="Address" name="address" rows = "4" cols = "50"></textarea>
              </div>
              <div class="input-field">
                  <i class="fa fa-phone" style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);"></i>
                  <input type="text" placeholder="Mobile Number" name="mno">
              </div>
              <div class="input-field">
                  <i class="fa fa-envelope" style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);"></i>
                  <input type="email" placeholder="Enter email" name="email">
              </div>
              <div class="input-field">
                <i class="fa fa-lock" style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);"></i>
                <input type="password" placeholder="Enter your password" name="password">
              </div>
    
            <input class="button" type="submit" value="Sign Up">
                <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
    <div class="image">
      <div class="overlay">
        <h3>Welcome to my website.Glad to hear that you are willing to join!.</h3>
        <p>Let's start exploring</p>
      </div>
    </div>
  </div>
  <div class="footer">
  <h2>&copy; 2023 Earth-Our Home Planet. All rights reserved.</h2>
</div>
        </form>

</body>
</html>    
      
      