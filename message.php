<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPhone = $_POST['userPhone'];
    $msgTitle = $_POST['msgTitle'];
    $msgSub = $_POST['msgSub'];

    echo htmlspecialchars($userName, ENT_QUOTES, 'UTF-8'); // Use htmlspecialchars to prevent XSS attacks

    if (!empty($userEmail) && !empty($msgSub)) {
        if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            $receiver = "email@gmail.com";
            $subject = "From $userName <$userEmail>";
            $body = "Name $userName\nEmail: $userEmail\nPhoneN: $userPhone\n\nMessageTitle: $msgTitle\n\n\nMessage: $msgSub";
            $headers = "From: $userEmail"; // Use the "From" header to set the sender's email

            if (mail($receiver, $subject, $body, $headers)) {
                echo 'Your Message has been sent';
            } else {
                echo 'Sorry, failed to send your Message!';
            }
        } else {
            echo 'Enter a valid email address';
        }
    } else {
        echo 'Email and Subject field are required';
    }
} else {
    echo 'Invalid request method';
}
?>
