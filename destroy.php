<?php
    session_start();
    session_destroy();
    header("location:/Hamburgermorgenpost/index.php");
    exit();
?>