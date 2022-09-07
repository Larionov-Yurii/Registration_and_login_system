<?php

session_start();
session_unset();
session_destroy();

// Going back to Start Page
header("Location: ../Login_page.php");
