<h1>Change User Password</h1> 

<?php

    include 'conn.php';
    include 'checkU.php';
    $recp = $_SESSION['recpID'];
    $uname= $_SESSION['name'];
    $sql ="  SELECT accounts.username,accounts.password FROM accounts      
    WHERE accounts.username = '$uname'";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);


    $password = $row['password'];                                                                                     
    ?>

    <form action = "cPass2.php" method ="POST">
    <Table>
            <tr>
            
            
            <tr>           
             <Td> <label>User Name:</label> </td>
             <td><input type="hidden" name='uname' value ='<?php print $uname; ?>'  > <?php print $uname; ?></tr>
        
             
             <tr>
             <Td> <label>Password:</label> </td>
             <td><input type='password' name='password' value ='<?php print $password; ?>' maxlength="30" required ></td></tr>
             <tr>
             </tr> 

             <tr>
             <Td> <label>Retype Password:</label> </td>
             <td><input type='password' name='password2' maxlength="30" required ></td></tr>
             <tr>
             </tr> 

             </table>
             <input type ="submit" value = "Change Password!">
        </input>
        </form>
        
        <form action="user.php" method="POST">
        <label for="recpID"></label><br>
        <input type="hidden" name="recpID" value='<?php print $recp; ?>'><br><br>
        <input type="submit" value="Return">