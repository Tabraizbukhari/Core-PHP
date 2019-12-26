<?php
session_start();
session_destroy();
session_unset();
session_cache_expire();
header('location: login.php');
exit();
?>
