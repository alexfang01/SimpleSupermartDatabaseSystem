<?php

	include 'conn.php';
	include 'checkA.php';

    $proID = $_GET['proID'];
    $recp = $_SESSION['recpID'];
    $sql =" DELETE FROM purchase WHERE recpID = '$recp' AND proID = '$proID'";

    $result = mysqli_query($con,$sql);


    ?>

<form action="admin.php" method="POST">
<label for="recpID"><b>Delete complete,Back to Edited Table : <?php echo $recp; ?> </b></label><br>
    <input type="hidden" name="recpID" value='<?php print $recp; ?>'><br><br>
    <input type="submit" value="Continue">