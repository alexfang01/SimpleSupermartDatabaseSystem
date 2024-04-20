<?php
include('conn.php');
include 'checkU.php';
$recp = $_SESSION['recpID'];
$proID = $_POST['proID'];
$quantity = $_POST['quantity'];

$sql = " INSERT INTO purchase (recpID, proID, quantity) VALUES ('$recp', '$proID', '$quantity')";
$result = mysqli_query($con,$sql);


?>

<form action="user.php" method="POST">
<label for="recpID"><b>Edit Complete, Back to Edited Table : <?php echo $recp; ?> </b></label><br>
    <input type="hidden" name="recpID" value='<?php print $recp; ?>'><br><br>
    <input type="submit" value="Continue">