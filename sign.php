<?php
$success = 0;
$suc = 1;
$user = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];


   
    if (strlen($username) < 3) {
        $suc = 0;
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Try other username!</strong> Username must be atleast 3 characters long.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if (strlen($name) < 3) {
        $suc = 0;
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Try other Name!</strong> Name must be atleast 3 characters long.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }


    if (strlen($password) < 8 || !preg_match('/\d/', $password)) {
        $suc = 0;
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Check password!</strong> Password must be at least 8 characters long and contain at least 1 number.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

    if (strlen($password) < 8 || !preg_match('/\d/', $password) || $password !== $conpassword) {
        $suc = 0;
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Check password!</strong> Password do not match with confirm password.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }



    $sql = "Select * from registration where username='$username'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $user = 1;
        } elseif ($suc) {
            $sql1 = "insert into registration (name,username,password) values('$name','$username','$password')";
            $result1 = mysqli_query($conn, $sql1);
            $sql2 = "insert into scores (uname) values('$username')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result1 &&  $result2 ) {
                $success = 1;
            } else {
                die(mysqli_error($conn));
            }
        }
    }
}
if ($user) {
    
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Try other username!</strong> This username already exist.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
} 
if ($success && $suc) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successful!</strong> You are successfully signup.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}




?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
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
            width: 25vw;
            height: 70vh;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        /* E6DD3A 3E47B1 */
        @media only screen and (max-width: 1353px) {
            .container1 {
                width: 30vw;

            }
        }

        @media only screen and (max-width: 1176px) {
            .container1 {
                width: 35vw;

            }
        }

        @media only screen and (max-width: 983px) {
            .container1 {
                width: 40vw;

            }
        }

        @media only screen and (max-width: 844px) {
            .container1 {
                width: 45vw;

            }
        }

        @media only screen and (max-width: 748px) {
            .container1 {
                width: 50vw;

            }
        }

        @media only screen and (max-width: 685px) {
            .container1 {
                width: 55vw;

            }
        }

        @media only screen and (max-width: 608px) {
            .container1 {
                width: 60vw;

            }
        }

        @media only screen and (max-width: 568px) {
            .container1 {
                width: 65vw;

            }
        }

        @media only screen and (max-width: 507px) {
            .container1 {
                width: 70vw;

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

            span {
                display: block;
            }

            .blue {
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

        @media only screen and (max-height: 666px) {
            .container1 {
                height: 75vh;

            }
        }


        @media only screen and (max-height: 633px) {
            .container1 {
                height: 80vh;

            }
        }

        @media only screen and (max-height: 584px) {
            .container1 {
                height: 85vh;

            }
        }

        @media only screen and (max-height: 540px) {
            .container1 {
                height: 90vh;

            }
        }

        input {
            color: red;
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

        .alertt {
            font-size: 0.7rem;
        }
    </style>

</head>

<body>

     <?php
//     if ($user) {
//         $success = 0;
//         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
//     <strong>Try other username!</strong> This username already exist.
//     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//   </div>';
//     }
//     if (strlen($username) < 3) {
//         $success = 0;
//         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
//     <strong>Try other username!</strong> Username must be atleast 3 characters long.
//     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//   </div>';
//     }


//     if (strlen($password) < 8 || !preg_match('/\d/', $password)) {
//         $success = 0;
//         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
//     <strong>Check password!</strong> Password must be at least 8 characters long and contain at least 1 number.
//     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//   </div>';
//     }

//     if (strlen($password) < 8 || !preg_match('/\d/', $password) || $password !== $conpassword) {
//         $success = 0;
//         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
//     <strong>Check password!</strong> Password do not match with confirm password.
//     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//   </div>';
//     }
//     if ($success) {
//         echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
//     <strong>Successful!</strong> You are successfully signup.
//     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//   </div>';
//     }
//     ?> 




    <div class="con">
        <h1 class="text-center "> <strong>Signup</strong> to check your <span class="blue">typing speed.</span></h1>
    </div>
    <div class="container">
        <div class="container1">
            <form action="sign.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name <span class='alertt'>(must be atleast of 3 characters) </span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your name" name="name">

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username <span class='alertt'>(must be atleast of 3 characters) </span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter username" name="username">

                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password <span class='alertt'> (must be atleast of 8 charachtets and 1 digit)</span></label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" name="password">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleConPassword1" placeholder="Enter Password" name="conpassword">
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-4">Signup</button>
                <p>Already have an account?</p> <a href="login.php">login now</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>



</body>

</html>