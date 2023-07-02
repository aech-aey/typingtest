
<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
} else {
    include 'connect.php';
    $username = $_SESSION['username'];

    $sql = "Select * from scores where uname='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
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
            overflow: hidden;
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
        table,
        td,
        th {
            border: 1px solid #E6DD3A;
            text-align: center;
            color: #E6DD3A;
        }

        table {
            border-collapse: collapse;
            width: 60%;
            
        }

        .tbl{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 90vh;
            
        }

        h1{
            color: #E6DD3A;
        }

        td,th{
            padding: 15px;
        }

        th{
            font-size: 22px;
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
                <h4> <a href="logout.php">Logout</a> </h4>
                <h4> <a href="home.php">Home</a> </h4>
            </div>
        </div>
    </div>
    <div class="tbl">
        <h1>Your Status</h1>
    <table>
        <tr>
        <th>Mode</th>
        <th>Score</th>
        </tr>
        <tr>
            <td>Normal</td>
            <td><?php echo $row['normal']; ?></td>
        </tr>
        <tr>
            <td>Python</td>
            <td><?php echo $row['python']; ?></td>
        </tr>
        <tr>
            <td>Javascript</td>
            <td><?php echo $row['javascipt']; ?></td>
        </tr>
        <tr>
            <td>C++</td>
            <td><?php echo $row['cplus']; ?></td>
        </tr>
        <tr>
            <td>Assembly</td>
            <td><?php echo $row['assembly']; ?></td>
        </tr>
        <tr>
            <td>Easy</td>
            <td><?php echo $row['easy']; ?></td>
        </tr>
        <tr>
            <td>Medium</td>
            <td><?php echo $row['medium']; ?></td>
        </tr>
        <tr>
            <td>Hard</td>
            <td><?php echo $row['hard']; ?></td>
        </tr>

    </table>
    </div>
</body>

</html>