<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{
		$id=$_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result)>0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	// redirect to login
	header("Location: login.php");
	die;
}

function random_num($length)
{
	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len=rand(4,$length);

	for ($i=0; $i < $len ; $i++) { 
		// code...

		$text .= rand(0,9);
	}

	return $text; 
}

function send_email($email){
    
    global $con;

    $expire = time() + (60 * 1);
    $code = rand(10000,99999);
    $email = addslashes($email);

    $query = "insert into codes (email,code,expire) value ('$email','$code','$expire')";
    mysqli_query($con,$query);

    //send email here
    send_mail($email,'Password reset',"Your code is " . $code);
  }
  
  function save_password($password){
    
    global $con;

    $password = password_hash($password, PASSWORD_BCRYPT);

    $email = addslashes($_SESSION['forgot']['email']);

    $query = "update users set password = '$password' where email = '$email' limit 1";
    mysqli_query($con,$query);

  }
  
  function valid_email($email){
    global $con;

    $email = addslashes($email);

    $query = "select * from users where email = '$email' limit 1";    
    $result = mysqli_query($con,$query);
    if($result){
      if(mysqli_num_rows($result) > 0)
      {
        return true;
      }
    }

    return false;

  }

  function is_code_correct($code){
    global $con;

    $code = addslashes($code);
    $expire = time();
    $email = addslashes($_SESSION['forgot']['email']);

    $query = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1";
    $result = mysqli_query($con,$query);
    if($result){
      if(mysqli_num_rows($result) > 0)
      {
        $row = mysqli_fetch_assoc($result);
        if($row['expire'] > $expire){

          return "the code is correct";
        }else{
          return "the code is expired";
        }
      }else{
        return "the code is incorrect";
      }
    }

    return "the code is incorrect";
  }