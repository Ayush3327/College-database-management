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
*{
	margin: 0px;
	padding: 0px;
	box-sizing: border-box;
}
.container {
    max-width: 70%;
    padding: 70px;
    margin: auto;
    background: aliceblue;
}
h1{
    text-align: center;
    background: #435d99;
    color: aliceblue;
}
form{
	display: flex;
	align-items: left;
	justify-content: center;
	flex-direction: column;
}
</style>

</head>
<body>

	<!-- <img class="im" src="im.jpg" alt="marketshop"> -->
	<div class="container">
    <h1>SHOPKEEPER DETAILS</h1><br>
		<form method="post">

		<?php

		
		$query = "SELECT shops.shopid as si, shops.name as sn, shops.area as sa, users.userid as ui, users.name as un, users.mobile as um, users.email as ue, AVG(review.rating) as av FROM owners join users on owners.ownerid = users.userid join shops on owners.shopid = shops.shopid join review on review.shopid = shops.shopid GROUP BY shops.shopid;";


			echo '<table border="2" cellspacing="6" cellpadding="6"> 
				<tr> 
					<td> <font face="Arial">Shop ID</font> </td> 
					<td> <font face="Arial">Shop Name</font> </td> 
					<td> <font face="Arial">Shop Area</font> </td> 
					<td> <font face="Arial">Owner ID</font> </td> 
					<td> <font face="Arial">Owner Name</font> </td> 
					<td> <font face="Arial">Mobile</font> </td> 
					<td> <font face="Arial">Email</font> </td> 
					<td> <font face="Arial">Rating</font> </td> 
				</tr>';

			if ($result = mysqli_query($con, $query)) {
				while ($row = $result->fetch_assoc()) {
					$field1name = $row["si"];
					$field2name = $row["sn"];
					$field3name = $row["sa"];
					$field4name = $row["ui"];
					$field5name = $row["un"];
					$field6name = $row["um"];
					$field7name = $row["ue"]; 
					$field8name = $row["av"]; 

					echo '<tr> 
							<td>'.$field1name.'</td> 
							<td>'.$field2name.'</td> 
							<td>'.$field3name.'</td> 
							<td>'.$field4name.'</td> 
							<td>'.$field5name.'</td> 
							<td>'.$field6name.'</td> 
							<td>'.$field7name.'</td> 
							<td>'.$field8name.'</td> 
						</tr>';
				}
				$result->free();
			} 
			
			

		?>
	
</form>
</div>
	
</body>
</html>