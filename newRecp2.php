<?php
include('conn.php');
include 'checkA.php';
$recp = $_SESSION['recpID'];


$recpID = $_POST['recpID'];
$IC = $_POST['IC'];
$date = $_POST['date'];


$sqlselect = mysqli_query($con,"select * from receipt where recpID='".$recpID."' ") or die(mysqli_error());
$count = mysqli_num_rows($sqlselect);
    if($count == 0)
    {
        $sql = " INSERT INTO receipt (recpID, IC, date) VALUES ('$recpID', '$IC', '$date')";
        $result = mysqli_query($con,$sql);
    }
    else{
        echo "<script> alert('ReceiptID duplicated, use a new one');
        window.location.href='newRecp.php'; 
        </script>";
    }


?>

<form action="admin.php" method="POST">
<label for="recpID"><b>New Receipt successfully created, Back to Edited Table : <?php echo $recpID; ?> </b></label><br>
    <input type="hidden" name="recpID" value='<?php print $recpID; ?>'><br><br>
    <input type="submit" value="Continue">