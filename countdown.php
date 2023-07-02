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
            
            <h3 class="heading">Please Select Your Language</h3> 
            <div class="btnmode ">
                <div class="btn"><a href="easy.php">Easy</a> </div> <br>
                <div class="btn"> <a href="medium.php">Medium</a> </div> <br>
                <div class="btn"> <a href="hard.php">Hard</a> </div> <br>
           

            </div>

        </div>
    </div>
    <!-- <script>
        const textarea = document.querySelector('#textarea');
        const btn = document.querySelector('.btn');
        const result = document.querySelector('.result');
        const sentence = document.querySelector('.sentence');
    

        let starttime;
        let endtime;
        let totaltime;
        let sentowrite;
        const sentences = [
            "If you're visiting this page, you're likely here because you're searching for a random sentence. ",
            "It can also be a fun way to surprise others. You might choose to share a random sentence on social media.",
            "You just to see what's type of reaction it garners from others.",
            "These are just a few ways that one might use the random sentence generator for their benefit. ",
            "For anyone who uses this tool and comes up with a way we can improve it.",
            "Hunt and peck (two-fingered typing) is a common form of typing in which the typist presses each key individually.",
            "Instead of relying on the memorized position of keys, the typist must find each key by sight. ",
            "Typists should sit up tall, leaning slightly forward from the waist, place their feet flat on the floor.",
            "A late 20th century trend in typing, primarily used with devices with small keyboards is thumbing or thumb typing.",
            "This can be accomplished using either only one thumb or both the thumbs, with speeds of 100 words per minute.",
            "Words per minute (WPM) is a measure of typing speed, commonly used in recruitment and others.",
            "For the purposes of WPM measurement a word is standardized to five characters or keystrokes. Therefore, 'brown' counts as one word.",
            "In one study of average computer users, the average rate for transcription was 33 words per minute, and 19 words per minute for composition.",
            "The fastest typing speed ever, 216 words per minute, was achieved by Stella Pajunas-Garnand from Chicago in 1946 in one minute .",
            "The recent emergence of several competitive typing websites has allowed fast typists on computer keyboards to emerge along with new records"

        ]
        const start = () => {
            let randomNumber = Math.floor(Math.random() * sentences.length);
            const check = sentence.innerHTML = sentences[randomNumber];

            let date = new Date();
            starttime = date.getTime();
            btn.innerText = 'Done';

        };

        const errorcheck = (actualwords) => {


            let num = 0;
            sentowrite = sentence.innerHTML.trim().split(' ');
            for (let i = 0; i < actualwords.length; i++) {
                if (actualwords[i] == sentowrite[i]) {
                    num++
                }

            }

            return num;
        }

        const caltypingspeed = (totaltime) => {
            let totalwords = textarea.value.trim();

            let actualwords = totalwords === '' ? 0 : totalwords.split(' ');

            actualwords = errorcheck(actualwords);

            if (actualwords !== 0) {
                let typingspeed = Math.round((actualwords / totaltime) * 60);
                result.innerHTML = `Your typing speed is ${typingspeed} words per minute & you wrote ${actualwords} correct words out of ${sentowrite.length}`;
            } else {
                result.innerHTML = `Your typing speed is 0 word per minute`;
            }
        }

        const end = () => {
            btn.innerText = 'Start';

            let date = new Date();
            endtime = date.getTime();

            totaltime = (endtime - starttime) / 1000;

            caltypingspeed(totaltime);

            sentence.innerHTML = ''
            textarea.value = '';

            textarea.placeholder="Click the start button";


        };
        btn.addEventListener('click', () => {
            if (btn.innerText.toLowerCase() == 'start') {

                textarea.removeAttribute('disabled');
                textarea.placeholder = 'Enter Text Here...'
                start();


            } else {
                textarea.setAttribute('disabled', 'true');
                end();
            }
        })
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>