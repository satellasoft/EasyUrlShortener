<?php
session_start();
session_destroy();
header("Location: login.php?q=1");
?>
