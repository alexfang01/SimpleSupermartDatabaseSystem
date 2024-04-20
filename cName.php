<h1>Edit Buyer Name</h1> 

<?php

    include 'conn.php';
    include 'checkU.php';
    $recp = $_SESSION['recpID'];
    $sql ="  SELECT buyer.IC,buyer.name FROM buyer      
    INNER JOIN receipt ON receipt.IC=buyer.IC
    WHERE receipt.recpID = '$recp'";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

    $IC = $row['IC'];
    $name = $row['name'];                                                                                     
    ?>

    <form action = "cName2.php" method ="POST">
    <Table>
            <tr>
            
            
            <tr>           
             <Td> <label>User IC:</label> </td>
             <td><input type="hidden" name='IC' value ='<?php print $IC; ?>'  > <?php print $IC; ?></tr>
        
             
             <tr>
             <Td> <label>User Name:</label> </td>
             <td><input type='text' name='name' value ='<?php print $name; ?>' maxlength="20" required ></td></tr>
             <tr>
             </tr> 

             </table>
             <input type ="submit" value = "Change Buyer Name!">
        </input>
        </form>
        
        <form action="user.php" method="POST">
        <label for="recpID"></label><br>
        <input type="hidden" name="recpID" value='<?php print $recp; ?>'><br><br>
        <input type="submit" value="Return">
