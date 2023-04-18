<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$userid = $_POST['userid'];
		$password = $_POST['passwrd'];
		$name = $_POST['name'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];

		if(!empty($name) && !empty($password) )
		{

			//save to database
			
			$query = "insert into users (userid,passwrd,name,age,gender,mobile,email)
			 values ('$userid','$password','$name','$age','$gender','$mobile','$email')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
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

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: black;">Signup</div>

			<input id="int" type="int" name="userid"       placeholder="Enter your user id">
			<input id="text" type="password" name="passwrd" placeholder="Enter your password">
			<input id="text" type="text" name="name"        placeholder="Enter your name">
			<input id="int" type="text" name="age"          placeholder="Enter your age">
			<input id="text" type="text" name="gender"      placeholder="Enter your gender">
			<input id="text" type="text" name="mobile"      placeholder="Enter your mobile">
			<input id="text" type="text" name="email"       placeholder="Enter your email">
			<input id="text" type="text" name="occupation" placeholder="guest or shop keeper">
			<button class="btn">Signup</button> <br>
			<!-- <input id="button" type="submit" value="signup"><br><br> -->

			<a href="login.php">Click to login</a><br><br>
		</form>
	</div>
</body>
</html>