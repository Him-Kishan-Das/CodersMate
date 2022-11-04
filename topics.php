<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coder's Mate - Topics</title>
    <link rel="stylesheet" href="./styles/topics.css">
</head>

<body>
    <?php
    include './Components/Navbar.php';
    ?>
    <div class="main">
        <div class="section1">
            <h1>Programming Languages</h1>

            <!-- Programming Languages  -->
            <div class="program">

                <div class="card">
                    <img src="./img/python.jpg" alt="python image" class="card-img">
                    <div class="card_container">
                        <h1 class="card_heading">Python</h1>
                        <p class="card_para">Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation. Python is dynamically-typed and garbage-collected. It supports multiple programming paradigms, including structured, object-oriented and functional </p>
                        <div class="card-details">
                            <button class="card_btn">View Queries</button>
                            <div class="stats">
                                <div class="stats-details">
                                    <p class="number">10</p>
                                    <p class="stats-title">Questions</p>
                                </div>
                                <div class="stats-details">
                                    <p class="number">10</p>
                                    <p class="stats-title">Replies</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Frameworks  -->
            <h1>FrameWorks</h1>
            <div class="program">

                <div class="card">
                    <img src="./img/django.jpg" alt="python image" class="card-img">
                    <div class="card_container">
                        <h1 class="card_heading">Django</h1>
                        <p class="card_para">Django is a free and open-source, Python-based web framework that follows the model–template–views architectural pattern. It is maintained by the Django Software Foundation, an independent organization established in the US as a 501 non-profit. </p>
                        <div class="card-details">
                            <button class="card_btn">View Queries</button>
                            <div class="stats">
                                <div class="stats-details">
                                    <p class="number">10</p>
                                    <p class="stats-title">Questions</p>
                                </div>
                                <div class="stats-details">
                                    <p class="number">10</p>
                                    <p class="stats-title">Replies</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php

    include './Components/Footer.php';
    ?>

</body>

</html>