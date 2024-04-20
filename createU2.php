<?php
include('conn.php');
include 'checkA.php';
$recp = $_SESSION['recpID'];
$uname = $_POST['uName'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$type = $_POST['type'];

$sqlselect = mysqli_query($con,"select * from accounts where username='".$uname."' ") or die(mysqli_error());
$count = mysqli_num_rows($sqlselect);

if($pass1==$pass2)
{
    
    if($count == 0)
    {
        $sql = " INSERT INTO accounts (username, password, type) VALUES ('$uname', '$pass1', '$type')";
        $result = mysqli_query($con,$sql);
    }
    else
    {
        $row = $sqlselect->fetch_assoc();
        $namee=$row['username'];
        echo "<script> alert(' IC number existed with Name : $uname');
                            window.location.href='createU.php'; 
        </script>";
    }
}
else
{
    echo '<script language="javascript">';
    echo 'alert("Please insert same Password twice")';
    echo '</script>';
	echo "Redirecting...";
	header('Refresh:0.01; url=createU.php');
}



?>

<form action="admin.php" method="POST">
<label for="recpID"><b>New User Acount has been Activated </b></label><br>
    <input type="hidden" name="recpID" value='<?php print $recp; ?>'><br><br>
    <input type="submit" value="Continue">