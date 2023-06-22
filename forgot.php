<?php 
session_start();
$error = array();

require "mail.php";

  include("connection.php");
  include("functions.php");

  $mode = "enter_email";
  if(isset($_GET['mode'])){
    $mode = $_GET['mode'];
  }

  //something is posted
  if(count($_POST) > 0){

    switch ($mode) {
      case 'enter_email':
        // code...
        $email = $_POST['email'];
        //validate email
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          $error[] = "Please enter a valid email";
        }elseif(!valid_email($email)){
          $error[] = "That email was not found";
        }else{

          $_SESSION['forgot']['email'] = $email;
          send_email($email);
          header("Location: forgot.php?mode=enter_code");
          die;
        }
        break;

      case 'enter_code':
        // code...
        $code = $_POST['code'];
        $result = is_code_correct($code);

        if($result == "the code is correct"){

          $_SESSION['forgot']['code'] = $code;
          header("Location: forgot.php?mode=enter_password");
          die;
        }else{
          $error[] = $result;
        }
        break;

      case 'enter_password':
        // code...
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if($password !== $password2){
          $error[] = "Passwords do not match";
        }elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
          header("Location: forgot.php");
          die;
        }else{
          
          save_password($password);
          if(isset($_SESSION['forgot'])){
            unset($_SESSION['forgot']);
          }

          header("Location: login.php");
          die;
        }
        break;
      
      default:
        // code...
        break;
    }
  }
  

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Forgot</title>
</head>
<body>
<style type="text/css">
  
  body{
  font-family: 'Poppins', sans-serif;
  height: 100px;
  width: 400px;
  background-image: url('wall1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  display:inline-table;
  justify-content: center;
  align-items: center;
}

  .norm{

  padding: 60px 120px; 
  display: flex;
  text-align:center;
  flex-direction: column;
  background-color: white;
}
.norm h1{
  font-family: Garamond, serif;
  font-size: 28px;
  font-weight: 500;
  text-align: left;
  position: relative;
  margin-bottom: 30px;
}
.norm h1::after{
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

  .textbox{
    padding: 5px;
    width: 180px;
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
</style>

    <?php 

      switch ($mode) {
        case 'enter_email':
          // code...
          ?>
            <form method="post" action="forgot.php?mode=enter_email">
            <div class = "card">
            <div class = "norm">
              <h1>Forgot Password</h1>
              <h3>Enter your registered email below</h3>
              <span style="font-size: 12px;color:red;">
              <?php 
                foreach ($error as $err) {
                  // code...
                  echo $err . "<br>";
                }
              ?>
              </span>
              <div class = "input-field">
              <input class="textbox" type="email" name="email" placeholder="Email"><br>
              <br style="clear: both;">
            </div>
              <input class="button" type="submit" value="Next">

              <br><br>

              <div>Back to <a href="login.php">Login</a></div>
            </div>
          </div>
            </form>
          <?php       
          break;

        case 'enter_code':
          // code...
          ?>
            <form method="post" action="forgot.php?mode=enter_code"> 
              <div class="card">
                <div class="norm">
              <h1>Forgot Password</h1>
              <h3 style="color: dimgrey;">Enter the code sent to your email</h3>
              <span style="font-size: 12px;color:red;">
              <?php 
                foreach ($error as $err) {
                  // code...
                  echo $err . "<br>";
                }
              ?>
              </span>
              <div class="input-field">
              <input class="textbox" type="text" name="code" placeholder="12345"><br>
              <br style="clear: both;">
            </div>
              <input class = "button" type="submit" value="Next" style="float: right;"><br>
              <a href="forgot.php">
                <input class="button" type="button" value="Start Over">
              </a>
              <br><br>
            </div>
          </div>
            </form>
          <?php
          break;

        case 'enter_password':
          // code...
          ?>
            <form method="post" action="forgot.php?mode=enter_password"> 
              <div class="card">
                <div class="norm">
              <h1>Forgot Password</h1>
              <h3>Enter your new password</h3>
              <span style="font-size: 12px;color:red;">
              <?php 
                foreach ($error as $err) {
                  // code...
                  echo $err . "<br>";
                }
              ?>
              </span>
              <div class="input-field">
              <input class="textbox" type="text" name="password" placeholder="Password"><br>
              <input class="textbox" type="text" name="password2" placeholder="Retype Password"><br>
              <br style="clear: both;">
            </div>
              <input class="button" type="submit" value="Next" style="float: right;">
              <a href="forgot.php"><br>
                <input class="button" type="button" value="Start Over">
              </a>
              <br><br>
            </div>
          </div>
            </form>
          <?php
          break;
        
        default:
          // code...
          break;
      }

    ?>


</body>
</html>