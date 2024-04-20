<?php
include('conn.php');
include 'checkU.php';
$recp = $_SESSION['recpID'];
$name = $_POST['name'];
$IC = $_POST['IC'];
$sql = " UPDATE buyer SET name = '".$_POST['name']."' where buyer.IC = '".$_POST['IC']."' ";
$result = mysqli_query($con,$sql);


?>

<form action="user.php" method="POST">
<label for="recpID"><b>Buyer Name had sucessfully change to : <?php echo $name; ?> </b></label><br>
    <input type="hidden" name="recpID" value='<?php print $recp; ?>'><br><br>
    <input type="submit" value="Continue">
