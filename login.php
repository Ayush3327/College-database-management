<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$userid = $_POST['userid'];
		$password = $_POST['passwrd'];

		if(!empty($userid ) && !empty($password))
		{

			//read from database
			$query = "select * from users where userid  = '$userid' limit 1";
			$result = mysqli_query($con, $query);
			
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['passwrd'] === $password)
					{

						$_SESSION['userid'] = $user_data['userid'];
						echo " userid ";
						// echo var_dump($result);
						header("Location: indexm.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
        
*{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}
.container{
    max-width: 80%;
    padding: 34px;
    margin: auto;
}
#box {
    background-color: #c5dbff;
    margin: auto;
    width: 300px;
    padding: 20px;
}
input{
    
    border: 2px solid black;
    border-radius: 6px;
    outline: none;
    font-size: 16px;
    width: 80%;
    margin: 11px 0px;
    padding: 7px;
    
}
form{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
.btn {
    color: white;
    background: #15144f;
    padding: 6px 13px;
    font-size: 15px;
    border: 2px solid white;
    border-radius: 20px;
    cursor: pointer;
}
    </style>
</head>
<body>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: black;">Login</div>

			<input id="int" type="int" name="userid" placeholder="Enter your username">
			<input id="text" type="password" name="passwrd" placeholder="Enter your password">

			<!-- <input id="button" type="submit" value="Login"><br><br> -->
			<button class="btn">Login</button> <br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>