<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel = "stylesheet" href = "style.css">
    <style>
        
        *{
    margin: 3px;
    padding: 0px;
    box-sizing: border-box;
}

.container{
    max-width: 80%;
    padding: 34px;
    margin: auto;
    color: black;
    background: #e7e7ff;
}
h1{
    text-align: center;
    background: #3f67af;
    color: #e7e7ff;
}
.openMsg{
    font-size: 20px;
    color: black;
    font-style: revert;
}
form{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
.fb{
    width: 100%;
    position: absolute;
    z-index: -1;
    opacity: 0.3;
}
    </style>
</head>
<body>
    <!-- <img class="fb" src="fb.jpg" alt="feedback"> -->
    <div class="container">

        <h1>FEEDBACK AND RATINGS</h1><br>
        
        <form action="feedback.php" method="post">
            
        <?php			
        
        $query = "SELECT shops.shopid as si, shops.name as sn, shops.area as sa, users.userid as ui, users.name as un, review.rating as rr, review.feedback as rf FROM owners join users on owners.ownerid = users.userid join shops on owners.shopid = shops.shopid join review on review.shopid = shops.shopid order by shops.shopid, review.rating;";


			echo '<table border="4" cellspacing="6" cellpadding="6"> 
				<tr> 
					<td> <font face="Sans">SHOP ID</font> </td> 
					<td> <font face="Sans">SHOP NAME</font> </td> 
					<td> <font face="Sans">SHOP AREA</font> </td> 
					<td> <font face="Sans">OWNER ID</font> </td> 
					<td> <font face="Sans">OWNER NAME</font> </td> 
					<td> <font face="Sans">RATING</font> </td> 
                    <td> <font face="Sans">FEEDBACK</font> </td>  
				</tr>';

			if ($result = mysqli_query($con, $query)) {
				while ($row = $result->fetch_assoc()) {
					$field1name = $row["si"];
					$field2name = $row["sn"];
					$field3name = $row["sa"];
					$field4name = $row["ui"];
					$field5name = $row["un"];
					$field6name = $row["rr"];
					$field7name = $row["rf"]; 

					echo '<tr> 
							<td>'.$field1name.'</td> 
							<td>'.$field2name.'</td> 
							<td>'.$field3name.'</td> 
							<td>'.$field4name.'</td> 
							<td>'.$field5name.'</td> 
							<td>'.$field6name.'</td>
                            <td>'.$field7name.'</td> 
						</tr>';
				}
				$result->free();
			} 
		
        ?>

        </form>
    </div>
</body>
</html>