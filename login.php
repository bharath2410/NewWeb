<?php 
session_start();

  include("connection.php");
  include("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {

  	//something was posted
  	$user_name = $_POST['email'];
  	$password = $_POST['password'];

  	if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
  	{
  		//read from database
        $query = "select * from users where email = '$user_name' limit 1" ;

        $result = mysqli_query($con,$query);
        if($result)
        {
        	if($result && mysqli_num_rows($result)>0)
		    {
			    $user_data = mysqli_fetch_assoc($result);
				  $verify = password_verify($password,$user_data['password']);
          if ($verify == 1) {
            $_SESSION['user_id'] = $user_data['user_id'];
          header("Location: index.php");
                    die;
          }
          else{
            echo "wrong user name or password!";
          }
				}
        }
  	  }else
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
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
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
.button:hover{
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
.social-container {
	margin: 20px 0;
}

.social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
  color: black;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
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
	</style>

	
		<form method="post">
			 <div class="card" style="-webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">

    <div class="norm" style="-webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
      <h3>Sign In</h3>
      <div class="input-field">
          <i class="fa fa-envelope" style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);"></i>
          <input type="email" placeholder="Enter your email" name="email">
      </div>
      <div class="input-field">
        <i class="fa fa-lock" style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);"></i>
        <input type="password" placeholder="Enter your password" name="password">
    </div>
    <a href="forgot.php" style="text-align: right;">Forgot Password?</a>
    
    <input class="button" type="submit" value="Login" >
    <p>Don't have an account? <a href="signup.php" >Signup now</a></p>
    </div>
    <div class="image">
      <div class="overlay">
        <h3>Some people can read War and Peace and come away thinking it's a simple adventure story<br>Others can read the ingredients on a chewing gum wrapper and unlock the secrets of the universe</h3>
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