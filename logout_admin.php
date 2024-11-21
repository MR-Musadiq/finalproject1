<?php
include('connection.php');
session_start();
session_unset();
session_destroy();
echo"<script>
alert('Logging you out… Thanks for spending time with us! See you again soon!');
location.assign('login.php')</script>";

?>