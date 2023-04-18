<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page for Market shop</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }
        .container{
            max-width: 80%;
            background-color: rgb(198, 152, 241);
            padding: 34px;
            margin: auto;
        }
        h1{
            color: steelblue;
            text-align: center;
            font-size: 61px;
        }
        p{
            text-align: center;
            font-size: 23px;
            color: darkblue;
        }
        a{
            background: darkblue;
            border: 2px solid black;
            border-radius: 6px;
            outline: none;
            font-size: 16px;
            width: 14%;
            margin: 11px 0px;
            padding: 7px;
            color: white;
        }
        form{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        
        .bg{
            width: 100%;
            position: absolute;
            z-index: -1;
            opacity: 0.8;
        }
    </style>
</head>
<body>
<img class="bg" src="bg.jpg" alt="IITP">
    <div class="conatiner">
    <h1>Welcome to IITP</h1><br><br>
    <br><br>
        <p class="openMsg">Hello, Services can be selected below by clicking on the links</p>
        <br><br>
        <form action="index.php" method="post">
            <a href="indexg.php">GUEST HOUSE SERVICES</a><br><br>
            <a href="indexm.php">MARKET SHOP SERVICES</a><br><br>
            <a href="indexl.php">LANDSCAPE SERVICES</a><br><br>
        </form>

    </div>
</body>
</html>