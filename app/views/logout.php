<?php
	session_start();
    $usertype = $_SESSION['usertype'];
    $user_id = $_SESSION['user_id'];
	session_destroy();
	header("Location:../../index.php?name=$usertype");
?>