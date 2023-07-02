<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
} else {
    include 'connect.php';
    $username = $_SESSION['username'];

    $sql = "Select * from registration where username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Racing+Sans+One&family=Rubik+Iso&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #262C53;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 10vh;
            background-color: #E6DD3A;
        }

        .abbu {
            background-color: #E6DD3A;
            height: 10vh;


        }

        h4>a {
            text-decoration: none;
        }

        .h2>a:hover {
            color: #262C53;

        }

        .logo {
            cursor: pointer;
            font-family: 'Racing Sans One', cursive;
            color: black;
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 90vh;
            width: 60vw;
            color: #E6DD3A;
        }





        .btn {
            background-color: #E6DD3A;
            color: #262C53;
            font-size: 20px;
            border: 3px solid black;

            padding: 6px 20px;
        }

        .btn>a {
            text-decoration: none;
            color: #262C53;
            font-family: 'Racing Sans One', cursive;
            font-size: 2rem;
            
        }

        .btn:hover {
            background-color: #cbc21a !important;
            color: #262C53;

            border: 4px solid black;

        }



        .mainabbu {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }




        .heading {
            text-align: center;
        }

        .btnmode{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-top: 3rem;
        }

        .logout{
            display: flex;
            width: 17vw;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="abbu">
        <div class="container">
            <div class="logo">
                <h2>TypingTest</h2>
            </div>

            <div class="logout">
          
                <h4> <a href="stats.php">Show Status</a> </h4>
                <h4> <a href="logout.php">Logout</a> </h4>

            </div>
       
        </div>
    </div>
    <div class="mainabbu">
        <div class="main">
            <h2 class="name"> <strong>Hello, <?php echo $row['name']; ?>!</strong> </h2>
            <h3 class="heading">Please Select Mode</h3> 
            <div class="btnmode ">
                <div class="btn"><a href="normal.php">Normal Mode</a> </div> <br>
                <div class="btn"> <a href="countdown.php">Countdown Mode</a> </div> <br>
                <div class="btn"> <a href="selectCoding.php">Coding Mode</a> </div>

            </div>

        </div>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>