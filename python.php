
<?php
session_start();
include 'connect.php';
$username = $_SESSION['username'];
$sql = "SELECT python FROM scores WHERE uname='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $dbvalue = $row['python'];
}
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $typingspeed = $_POST['typingspeed'];
        
     

        if ($typingspeed > $dbvalue) {
            // Update the database value
            $sql = "UPDATE scores SET python = $typingspeed WHERE uname='$username'";
            $conn->query($sql);
        }
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

        textarea {
            background-color: #cbc21a;
            color: #262C53;
            resize: none;
            border: 5px solid black;
            border-radius: 25px;
            padding: 10px 5px;
            font-size: 20px;
            font-weight: 800;

            outline: none;
        }

        textarea::placeholder {
            color: #262C53;
            font-size: 18px;
        }

        .btn {
            background-color: #E6DD3A;
            color: #262C53;
            font-size: 20px;
            border: 3px solid black;

            padding: 6px 20px;
        }

        .btn:hover {
            background-color: #cbc21a !important;
            color: #262C53;

            border: 4px solid black;

        }

        .typingsection {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .mainabbu {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .sentence {
            font-size: 18px;
            color: white;
          
        }

        .result {
            font-size: 18px;
            font-weight: 600;
            margin-top: 5px;
        }

        
        @media only screen and (max-width: 855px) {
                textarea {
                width: 80vw;
              
            }
        }

        .heading{
            text-align: center;
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
            <h2 class="name"> <strong>Coding Mode - </strong>Python</h2>
            <h3 class="heading"> Let's check your typing speed</h3>
            <p class="sentence"></p>
            <div class="typingsection">

                <textarea name="textarea" id="textarea" cols="60" rows="8" placeholder="Click the start button" disabled></textarea>

                <br>
                <button class="btn">Start</button>
            </div>
            <p class="result"></p>
        </div>
    </div>
    <script>
        const textarea = document.querySelector('#textarea');
        const btn = document.querySelector('.btn');
        const result = document.querySelector('.result');
        const sentence = document.querySelector('.sentence');
    

        let starttime;
        let endtime;
        let totaltime;
        let sentowrite;
        const sentences = [
    `<pre>user_input = input("Type something: ")
print("You typed:", user_input)</pre>`,
    `<pre>if user_input == "John":
    print("Congratulations, your name is correct!")</pre>`,
    `<pre>num1 = int(input("Enter the first number: "))
num2 = int(input("Enter the second number: "))</pre>`,
    `<pre>sum = num1 + num2
print("The sum is:", sum)</pre>`,
    `<pre>user_input = input("Enter a string: ")
char_count = len(user_input.replace(" ", ""))</pre>`,
    `<pre>def is_prime(num):
    if num <= 1:
        return False</pre>`
];
 

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


                var form = document.createElement('form');
                form.method = 'POST';
                form.style.display = 'none';

                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'typingspeed';
                input.value = typingspeed;

                form.appendChild(input);
                document.body.appendChild(form);

                form.submit();
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

            textarea.placeholder="Click the start button"


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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>