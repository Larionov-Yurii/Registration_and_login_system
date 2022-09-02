<?php
session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="../Css/Registration_style.css">
    <script src="../Jquery/jquery-3.4.1.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <div id="logo">
        <a href="../Login_page.php"><span>WPG</span></a>
    </div>
</header>
<div id="Register-main">
    <h5 id="h5-correct">REGISTER</h5>
    <div id="all">
        <form id="form-input" action="../Logic_system/Signup_including.php" method="post" enctype="multipart/form-data">
            <label>
                <input type="text" class="input-words" placeholder="Write login" name="login" id="login"><br>
            </label>
            <label>
                <input type="email" class="input-words" placeholder="Write email" name="email" id="email" ><br>
            </label>
            <label>
                <input type="password" class="input-words" placeholder="Write password" name="password" id="password" ><br>
            </label>
            <label>
                <input type="password" class="input-words" placeholder="Write your password again" name="password-2" id="password-2" ><br>
            </label>
            <label>
                <input type="text" class="input-words" placeholder="Write your secret question" name="secret-question" id="secret-question" ><br>
            </label>
            <div class="text-button"><button type="submit" name="do-signup" id="send-mess" class="btn">Submit</button></div>
        </form>
    </div>

    <?php
    if (isset($_SESSION['empty-inputs'])) {
        echo '<p class = "errors">' . $_SESSION['empty-inputs'] . '</p>';
    }
    unset($_SESSION['empty-inputs']);
    ?>

    <?php
    if (isset($_SESSION['invalid-login'])) {
        echo '<p class = "errors">' . $_SESSION['invalid-login'] . '</p>';
    }
    unset($_SESSION['invalid-login']);
    ?>

    <?php
    if (isset($_SESSION['invalid-email'])) {
        echo '<p class = "errors">' . $_SESSION['invalid-email'] . '</p>';
    }
    unset($_SESSION['invalid-email']);
    ?>

    <?php
    if (isset($_SESSION['password-mismatch'])) {
        echo '<p class = "errors">' . $_SESSION['password-mismatch'] . '</p>';
    }
    unset($_SESSION['password-mismatch']);
    ?>

    <?php
    if (isset($_SESSION['data-is-already-taken'])) {
        echo '<p class = "errors">' . $_SESSION['data-is-already-taken'] . '</p>';
    }
    unset($_SESSION['data-is-already-taken']);
    ?>

    <?php
    if (isset($_SESSION['wrong-stmt'])) {
        echo '<p class = "errors">' . $_SESSION['wrong-stmt'] . '</p>';
    }
    unset($_SESSION['wrong-stmt']);
    ?>

    <?php
    if (isset($_SESSION['all-good'])) {
        echo '<p class = "errors">' . $_SESSION['all-good'] . '</p>';
    }
    unset($_SESSION['all-good']);
    ?>

</div>
</body>
</html>
