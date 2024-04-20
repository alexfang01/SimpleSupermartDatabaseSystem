<?php

include 'conn.php';
include 'checkU.php';

    $proID = $_GET['proID'];
    $recp = $_SESSION['recpID'];
    $sql =" DELETE FROM purchase WHERE recpID = '$recp' AND proID = '$proID'";

    $result = mysqli_query($con,$sql);


    ?>

<form action="user.php" method="POST">
<label for="recpID"><b>Delete complete,Do not Try to Steal Stuff : <?php echo $recp; ?> </b></label><br>
    <input type="hidden" name="recpID" value='<?php print $recp; ?>'><br><br>
    <input type="submit" value="Continue">