<?php
include 'conn.php';
include 'checkA.php';
$recp = $_SESSION['recpID'];



$IC = $_POST['IC'];
$name = $_POST['name'];
$address = $_POST['address'];


$sqlselect = mysqli_query($con,"select * from buyer where IC='".$IC."' ") or die(mysqli_error());
$count = mysqli_num_rows($sqlselect);

if (strlen($IC)<14)
{
    echo"<script> alert('Please insert a valid IC number');
        window.location.href='newBuyer.php';
        </script>";
}

else
{
    if($count == 0)
    {
        $sql = " INSERT INTO buyer (IC, name, address) VALUES ('$IC', '$name', '$address') ";
        $result = mysqli_query($con,$sql);
    }
    else
    {
        $row = $sqlselect->fetch_assoc();
        $namee=$row['name'];
        echo "<script> alert(' IC number existed with Name : $namee');
                            window.location.href='newBuyer.php'; 
        </script>";
    }
}

?>

<form action="newRecp.php" method="POST">
<label for="recpID"><b>New Buyer <?php echo $name; ?> successfully created, Continue create receipt.. </b></label><br>
    <input type="hidden" name="recpID" value='<?php print $recpID; ?>'><br><br>
    <input type="submit" value="Continue">