<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coder's Mate - Contact Us</title>
    <link rel="stylesheet" href="./styles/contact.css">
</head>

<body>
    <?php
    include './Components/dbconnect.php';
    include './Components/Navbar.php';
    ?>

    <div class="container">
        <h2>Send us a Message</h2>
        <hr>
        <form action="" method="post" class="contactForm">
            <label for="personName" class="formText">Your name</label>
            <input type="text" name="personName" class="formInput">
            <label for="personEmail" class="formText">Your email adress</label>
            <input type="text" name="personEmail" class="formInput">
            <label for="message" class="formText">Your message</label>
            <textarea name="message" cols="30" rows="5"></textarea>
            <button class="sendBtn" name="sendEmail">Send</button>
        </form>
    </div>

    //Contact Form in PHP
    <?php
    


    $name = htmlspecialchars($_POST['personName']);
    $email = htmlspecialchars($_POST['personEmail']);
    // $phone = htmlspecialchars($_POST['phone']);
    // $website = htmlspecialchars($_POST['website']);
    $message = htmlspecialchars($_POST['message']);

    ini_set("SMTP", "aspmx.l.google.com");
    ini_set("sendmail_from", $email);

    if (!empty($email) && !empty($message)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $receiver = "himkishandas456@gmail.com"; //enter that email address where you want to receive all messages
            $subject = "From: $name <$email>";
            $body = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message\n\nRegards,\n$name";
            $sender = "From: $email";
            if (mail($receiver, $subject, $body, $sender)) {
                echo "Your message has been sent";
            } else {
                echo "Sorry, failed to send your message!";
            }
        } else {
            echo "Enter a valid email address!";
        }
    } else {
        echo "Email and message field is required!";
    }
    ?>


</body>

</html>