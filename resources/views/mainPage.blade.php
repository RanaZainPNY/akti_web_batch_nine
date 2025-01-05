<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1 {
            background-color: purple;
            color: white;
        }
    </style>
</head>

<body>
    <h1>This is main page of my website</h1>
    <a href="/">Go Back</a>
    <button id='btn'>Click</button>

    <?php
    echo '<ul>';
    echo '<li>One</li>';
    echo '<li>two</li>';
    echo '<li>three</li>';
    echo '</ul>';
    ?>

    <script>
        btnElem = document.getElementById('btn');
        btnElem.addEventListener('click', function() {
            alert("button clicked");
        })
    </script>
</body>

</html>
