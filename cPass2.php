<?php
include('conn.php');
include 'checkU.php';
$recp = $_SESSION['recpID'];
$pass1=$_POST['password'];
$pass2=$_POST['password2'];

if($pass1==$pass2)
{
$sql = " UPDATE accounts SET password = '".$_POST['password']."' where accounts.username = '".$_POST['uname']."' ";
$result = mysqli_query($con,$sql);
}
else
{
    echo "<script> alert(' Please ensure password is the SAME ! ');
                            window.location.href='cPass.php'; 
        </script>";
}

?>

<form action="user.php" method="POST">
<label for="recpID"><b>Passowrd had sucessfully changed </b></label><br>
    <input type="hidden" name="recpID" value='<?php print $recp; ?>'><br><br>
    <input type="submit" value="Continue">