<?php
   
    session_start();

	include("connection.php");
	include("functions.php");
    
    $user_data = check_login($con);
    
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
    // $id = $user_data['userid'];
    $shopid=$_POST["shopid"];
    $licid=$_POST["licenceid"];
    $months=$_POST["months"];
    if(!empty($shopid ) && !empty($licid) && !empty($months))
	{
        $query = "INSERT INTO payext (shopid, licenceid, months) VALUES ('$shopid', '$licid', '$months');";
		mysqli_query($con, $query);
		$query = "UPDATE licence SET lastdate = DATE_ADD(lastdate, INTERVAL '$months' month) WHERE licenceid = '$licid';";
		mysqli_query($con, $query);
        echo "Licence Period extended";
    }
    else{
        echo "Enter valid details";
    }

} 
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
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    /* font-family: 'Roboto', sans-serif; */
}

.container{
    max-width: 80%;
    padding: 34px;
    margin: auto;
}
.container h1, p{
    text-align: center;
}
h1{
    font-size: 50px;
}
.openMsg{
    font-size: 20px;
    color: black;
}
.submitMsg{
    font-size: 14px;
    color: rebeccapurple;
}
input, textarea{
    
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
.btn{
    color: white;
    background: purple;
    padding: 8px 12px;
    font-size: 20px;
    border: 2px solid white;
    border-radius: 14px;
    cursor: pointer;
}

    </style>
</head>
<body>
    <!-- <img class="bg" src="bg.jpg" alt="IITP"> -->
    <div class="container">
        
        <p class="openMsg">Select your shopid and licenceid for extension</p>
        
        <form action="payext.php" method="post">
            <input type="int" name="shopid" id="shopid" placeholder="Enter your shop id">
            <input type="int" name="licenceid" id="licenceid" placeholder="Enter your licence id">
            <input type="int" name="months" id="months" placeholder="Enter number of months">
            <!-- <textarea name="feedback" id="feedback" cols="30" rows="10" placeholder="Enter your feedback"></textarea>   -->
            <button class="btn">Extend Licence</button>         
        </form>


    </div>
</body>
</html>


