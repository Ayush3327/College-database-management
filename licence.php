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
    background: steelblue;
}
.link{
	font-size: 17px;
	text-align: center;
}
*{
	margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    background: aliceblue;
}
.container {
    max-width: 70%;
    padding: 70px;
    margin: auto;
    background: #e7e7ff;
}
form{
	display: flex;
	align-items: left;
	justify-content: center;
	flex-direction: column;
}
p{
    color: crimson;
    font: initial;
    font-style: oblique;
    font-size: medium;
}
h1{
    text-align: center;
    background: #3f67af;
    color: #e7e7ff;
}
/* .im{
	width: 100%;
	position: absolute;
	z-index: -1;
	opacity: 0.8;
} */
</style>

</head>
<body>

	<!-- <img class="im" src="im.jpg" alt="marketshop"> -->
	<div class="container">
        
        <h1>LICENCE PERIOD DETAILS</h1><br>

        <a class = "link" href="payext.php">Extend Licence</a><br>
        
        <p class="openMsg">The Expired licences are highlighted red</p>
        
		<form method="post">
        
		<?php
            // $id = $_SESSION['userid'];
            // echo var_dump($id);
            // echo $id;
		    // $query = "select s.shopid as si, s.name as sn, u.id as ui, u.name as un, r.total as rt, r.lastdate as rl from shops s join rent r on s.rentid = r.rentid join users u on s.ownerid = u.userid where r.lastdate > '2021-11-29';";
            $query = "SELECT shops.shopid as si, shops.name as sn, shops.area as sa, users.userid as ui, users.name as un, licence.lastdate as ll, licence.extensioncost as le FROM owners join users on owners.ownerid = users.userid join shops on shops.shopid = owners.shopid join licence on licence.licenceid = shops.licenceid where licence.lastdate < current_timestamp();";


			echo '<table border="2" cellspacing="6" cellpadding="6"> 
				<tr> 
					<td> <font face="Arial">Shop ID</font> </td> 
					<td> <font face="Arial">Shop Name</font> </td> 
					<td> <font face="Arial">Owner ID</font> </td> 
					<td> <font face="Arial">Owner Name</font> </td> 
					<td> <font face="Arial">Expiry date</font> </td> 
					<td> <font face="Arial">Extension cost</font> </td> 
				</tr>';

			if ($result = mysqli_query($con, $query)) {
				while ($row = $result->fetch_assoc()) {
					$field1name = $row["si"];
					$field2name = $row["sn"];
					$field3name = $row["ui"];
					$field4name = $row["un"];
					$field5name = $row["ll"]; 
					$field6name = $row["le"]; 
					echo '<tr> 
							<td>'.$field1name.'</td> 
							<td>'.$field2name.'</td> 
							<td>'.$field3name.'</td> 
							<td>'.$field4name.'</td> 
							<td><font color="red">'.$field5name.'</font></td> 
							<td>'.$field6name.'</td> 
						</tr>';
				}
				$result->free();
			} 
			
			

		?>
        <?php
            
            $query = "SELECT shops.shopid as si, shops.name as sn, shops.area as sa, users.userid as ui, users.name as un, licence.lastdate as ll, licence.extensioncost as le FROM owners join users on owners.ownerid = users.userid join shops on shops.shopid = owners.shopid join licence on licence.licenceid = shops.licenceid where licence.lastdate >= current_timestamp();";

			if ($result = mysqli_query($con, $query)) {
				while ($row = $result->fetch_assoc()) {
					$field1name = $row["si"];
					$field2name = $row["sn"];
					$field3name = $row["ui"];
					$field4name = $row["un"];
					$field5name = $row["ll"]; 
					$field6name = $row["le"]; 
					echo '<tr> 
							<td>'.$field1name.'</td> 
							<td>'.$field2name.'</td> 
							<td>'.$field3name.'</td> 
							<td>'.$field4name.'</td> 
							<td>'.$field5name.'</td> 
							<td>'.$field6name.'</td> 
						</tr>';
				}
				$result->free();
			} 
			
			
	

		?>
	
</form>
</div>
	
</body>
</html>