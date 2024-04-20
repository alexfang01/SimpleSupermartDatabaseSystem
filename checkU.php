<?php

	if (!isset($_SESSION['loggedin']) OR ($_SESSION['type']!='u')) {
        echo '<script language="javascript">';
        echo 'alert("YOU ARE NOT LOG IN AS USER!!")';
        echo '</script>';
	echo "Redirecting...";
	header('Refresh:1; url=index.php');
	exit;
}

?>