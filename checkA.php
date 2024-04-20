<?php

	if (!isset($_SESSION['loggedin']) OR ($_SESSION['type']!='a')) {
        echo '<script language="javascript">';
        echo 'alert("YOU ARE NOT LOG IN AS ADMIN!!")';
        echo '</script>';
	echo "Redirecting...";
	header('Refresh:1; url=index.php');
	exit;
}

?>