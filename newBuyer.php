<?php
    include 'conn.php';
	include 'checkA.php';
    $recp = $_SESSION['recpID'];
    
    
    $sql ="SELECT*FROM buyer ";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

                                                                                  
    ?>
    <h1>Register new Buyer</h1> 
    <form action = "newBuyer2.php" method ="POST">
    <Table>
            <tr>

             <tr>           
             <Td> <label>Identity Card Number:</label> </td>
             <td><input type="text" name='IC' placeholder="( 000000-00-0000 )" maxlength='14' required></tr>       

             <tr>           
             <Td> <label>Name:</label> </td>
             <td><input type="text" name='name' placeholder="( Based on name in IC )" maxlength='20' required></tr>   
        
             <tr>           
             <Td> <label>Address:</label> </td>
             <td><input type="text" name='address' placeholder="( Address )" maxlength='40' required></tr> 

            </tr>

             </table>
             <br>
             <input type ="submit" value = "Create">
        </form>
    <p>
    

    <form action="newRecp.php" method="POST">
    <label for="recpID"></label><br>
    <input type="hidden" name="recpID" value='<?php print $recp; ?>'><br> <br>
     
    <input type="submit" value="Return"><br><br>
