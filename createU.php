<?php
    include 'conn.php';
    include 'checkA.php';
    $recp = $_SESSION['recpID'];
    
    
    $sql ="SELECT*FROM accounts ";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
                                                                                    
    ?>

    <h1>Create New User</h1> 
    <form action = "createU2.php" method ="POST">
    <Table>
            <tr>

             <tr>           
             <Td> <label>Username:</label> </td>
             <td><input type="text" name='uName' placeholder="( max 20 characters )" maxlength='20' required></tr>       

             <tr>           
             <Td> <label>Password:</label> </td>
             <td><input type="password" name='pass1' placeholder="( Password )" maxlength='30' required></tr>
             
             <tr>           
             <Td> <label>Retype Password:</label> </td>
             <td><input type="password" name='pass2' placeholder="( Retype Password )" maxlength='30' required></tr>  
        
             <tr>           
             <Td> <label>Account Type :</label> </td>
             <td><input type="hidden" name='type' value='u' > User</tr> 

             </table><br>
             <input type ="submit" value = "Create now">
        </form>
    <p>
    

    <form action="admin.php" method="POST">
    <label for="recpID"></label><br>
    <input type="hidden" name="recpID" value='<?php print $recp; ?>'><br><br>
    <input type="submit" value="Return">