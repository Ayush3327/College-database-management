<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>

	<style type="text/css">

.msg {
    font-size: 25px;
    color: white;
    text-align: center;
    background: #1858a7;
}
.link{
	font-size: 20px;
	text-align: center;
}
*{
	margin: 0px;
	padding: 0px;
	box-sizing: border-box;
}
.container {
    max-width: 100%;
    padding: 100px;
    margin: auto;
    background: #e7efff;
}
form{
	display: flex;
	align-items: left;
	justify-content: center;
	flex-direction: column;
}
.im{
	width: 100%;
	position: absolute;
	z-index: -1;
	opacity: 0.8;
}
</style>

</head>
<body>

	<!-- <img class="im" src="im.jpg" alt="marketshop"> -->
	<div class="container">
		<?php echo "Hello, " . $user_data['name'] . ". "; ?><br><br>
<form method="post">

		<p class="msg">THE MARKET SHOP</p><br>
		<a class = "link" href="shopkeeper.php">Shop keeper details</a><br>
		<a class = "link" href="rent.php">Rent status</a><br>
		<a class = "link" href="licence.php">Licence period</a><br>
		<a class = "link" href="feedback.php">Performance management</a><br>
		<a class = "link" href="performance.php">Click here to give feedback</a><br>
		<a class = "link" href="logout.php">logout</a><br><br>
    
	
</form>
</div>
	
</body>
</html>