<?php

$invalid = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $username = $_POST['username'];

    $password = $_POST['password'];


    $sql = "Select * from registration where username='$username' and password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            
            session_start();
            $_SESSION['username'] = $username;
          
            header('location:home.php');
        } else {
            $invalid = 1;
        }
    }
}




?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background: rgba(0, 0, 0, 0.6)url(1.jpg);
            height: 100vh;
            color: white;
            background-blend-mode: darken;
            background-repeat: no-repeat;
            background-size: cover;

            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-direction: column;

        }

        .container {
            display: flex;

            justify-content: space-around;
            ;
        }

        .container1 {
            width: 20vw;
            height: 50vh;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        /* E6DD3A 3E47B1 */

        @media only screen and (max-width: 1353px) {
            .container1 {
                width: 25vw;
              
            }
        }

        @media only screen and (max-width: 1176px) {
            .container1 {
                width: 30vw;
               
            }
        }

        @media only screen and (max-width: 983px) {
            .container1 {
                width: 35vw;
               
            }
        }
        @media only screen and (max-width: 844px) {
            .container1 {
                width: 40vw;
              
            }
        }
        @media only screen and (max-width: 748px) {
            .container1 {
                width: 45vw;
            
            }
        }

        @media only screen and (max-width: 685px) {
            .container1 {
                width: 50vw;
             
            }
        }

        @media only screen and (max-width: 608px) {
            .container1 {
                width: 55vw;
              
            }
        }
        @media only screen and (max-width: 568px) {
            .container1 {
                width: 60vw;
                
            }
        }
        @media only screen and (max-width: 507px) {
            .container1 {
                width: 65vw;
                
            }
        }

        
        label {
            color: #3E47B1;
        }
        
        .blue {
            color: #E6DD3A;
        }
        
        
        @media only screen and (max-width: 480px) {
            .container1 {
                width: 70vw;
               
            }
            span{
                display: block;
            }

            .blue{
                color: #262C53;
            }
        }

        @media only screen and (max-width: 435px) {
            .container1 {
                width: 75vw;
                
            }
        }

        @media only screen and (max-width: 350px) {
            .container1 {
                width: 80vw;
                
            }
        }

        @media only screen and (max-height: 639px) {
            .container1 {
                height: 60vh;
                
            }
        }


        @media only screen and (max-height: 550px) {
            .container1 {
                height: 65vh;
                
            }
        }

        @media only screen and (max-height: 490px) {
            .container1 {
                height: 70vh;
                
            }
        }

        @media only screen and (max-height: 450px) {
            .container1 {
                height: 80vh;
                
            }
        }


        .btn {
            text-align: center;
            background-color: #3E47B1;
            border: none;
        }

        .btn:hover {
            background-color: #262C53;

        }

        p {
            margin: 0.5rem;
        }
    </style>
</head>

<body>

    <?php
    if ($invalid) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Try again!</strong> Invalid username or password.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    ?>
  
    <div class="con">
        <h1 class="text-center "> <strong>Login</strong> to check your <span class="blue">typing speed.</span></h1>
    </div>

    <div class="container ">


        <div class="container1 ">
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your username" name="username">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" name="password">
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-4 mb-2">Login</button>
                <p>Dont have an account?</p> <a href="sign.php">signup now</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>