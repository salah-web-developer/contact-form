<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/dark-mode.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js" defer></script>
</head>

<body>
    <main>
        <div class="container">
            <header>Contact Us <button id="theme-toggle" aria-label="Toggle Theme"></button>
            </header>

            <form action="process_form.php" method="post">
                <div class="row-field">
                    <div class="field">
                        <input name="userName" type="text" placeholder="Enter Your Name" required>
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="field">
                        <input name="userEmail" type="email" placeholder="Enter Your Email" required>
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>

                <div class="row-field">
                    <div class="field">
                        <input name="userPhone" type="number" placeholder="Enter Your Phone" required>
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="field">
                        <input name="msgTitle" type="text" placeholder="Enter Your Title" required>
                        <i class="fa-solid fa-heading"></i>
                    </div>
                </div>

                <div class="message">
                    <textarea name="msgSub" placeholder="Write Your Message" required></textarea>
                </div>

                <div class="button">
                    <button type="submit">Send Message</button>
                    <span>Sending Your Message.........</span>
                </div>
            </form>
        </div>
    </main>
</body>

</html>