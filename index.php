<?php
  include 'conn.php';


if(isset($_SESSION['loggedin'])) 
{
    if ($_SESSION['type']==='a')
    {
      echo '<script language="javascript">';
      echo 'alert("Switching to Admin Page..")';
      echo '</script>';
      echo "Proceed to Admin Page";
    header('Refresh:1; url=admin.php');
    exit;
    }
    else if ($_SESSION['type']==='u')
    {
      echo '<script language="javascript">';
      echo 'alert("Proceed to User Page")';
      echo '</script>';
      echo "Switching to User Page..";
    header('Refresh:1; url= user.php');
    exit;
    }
  }
?>

<html>

<body>

<h2>AlexF Mart LoginPage</h2>

<form action="login.php" method="post">
  <label for="uname">User Name :</label><br>
  <input type="text" name="username" maxlength="10" required ><br>
  <label for="pws">Password :</label><br>
  <input type="password" name="password" maxlength="30" required ><br><br>
  
    <input type="radio" name="type" value="a" checked="checked">
    <label for="Admin">Admin</label><br>
    <input type="radio" name="type" value="u">
    <label for="User">User</label><br>
    <br><br>
    <input type="submit" value="Submit">
  
</form> 

</body>
</html>

