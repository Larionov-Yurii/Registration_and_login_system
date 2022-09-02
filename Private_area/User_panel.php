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
    <link rel="stylesheet" href="../Css/Admin_style.css">
    <script src="../Jquery/jquery-3.4.1.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <div id="logo">
        <a href="../Login_page.php"><span>WPG</span></a>
        <a href="../Logic_system/Logout.php" class="btn"><span id="logout-button">Logout</span></a>
    </div>
</header>
<form id="visiting">
    <?php
    if (isset($_SESSION["login"])) {
        echo '<p class = "user-style">'. 'Welcome to your personal area ' . $_SESSION["login"] . '</p>';
    }
    ?>
</form>

</body>
</html>
