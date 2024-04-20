<?php

	include 'conn.php';


    $uname = $_SESSION['name'];
    $sql =" DELETE FROM accounts WHERE username = '$uname' ";

    $result = mysqli_query($con,$sql);

    echo nl2br("Account Terminated!\n");
	header('Refresh:3; url=logout.php');

    ?>
