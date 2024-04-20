<?php
include('conn.php');
include 'checkA.php';
$recp = $_SESSION['recpID'];
$sql = " UPDATE purchase SET proID = '".$_POST['proID']."', quantity = '".$_POST['quantity']."' where purchase.pID = '".$_POST['pID']."' ";
$result = mysqli_query($con,$sql);


?>

<form action="admin.php" method="POST">
<label for="recpID"><b>Edit Complete, Back to Edited Table : <?php echo $recp; ?> </b></label><br>
    <input type="hidden" name="recpID" value='<?php print $recp; ?>'><br><br>
    <input type="submit" value="Continue">

    
    