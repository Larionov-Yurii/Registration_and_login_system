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
    <title>Login</title>
    <link rel="stylesheet" href="./Css/Login_style.css">
    <script src="./Jquery/jquery-3.4.1.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <div id="logo">
        <?php
        if (isset($_SESSION["login"])) {
            echo '<a href="./Private_area/User_panel.php">'. $_SESSION["login"] .'</a>';
        } else {
            echo '<span>WPG</span>';
        }
        ?>
    </div>
</header>

<div id="Login-main">
    <h5 id="h5-correct">LOGIN</h5>
    <div id="all">
        <form id="form-input" action="Logic_system/Login_including.php" method="post">
            <label>
                <input type="text" placeholder="LOGIN" name="login" id="login"><br>
            </label>
            <label>
                <input type="password" placeholder="PASSWORD" name="password" id="password"><br>
            </label>
            <div class="text-button"><button type="submit" name="do-login" id="send-mess" class="btn">Sign in</button></div>
            <div class="register" id="reg-link">
                <a href="./Registration_page/Registration_page.php"><span>Register</span></a>
            </div>
        </form>
    </div>

    <?php
    if (isset($_SESSION['notes'])) {
        echo '<p class = "errors">' . $_SESSION['notes'] . '</p>';
    }
    unset($_SESSION['notes']);
    ?>

</div>
</body>
</html>
