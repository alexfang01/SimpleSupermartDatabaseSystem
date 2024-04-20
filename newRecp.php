<?php
    include 'conn.php';
	include 'checkA.php';
    $recp = $_SESSION['recpID'];
    
    
    $sql ="SELECT*FROM purchase ";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

                                                                                     
    ?>
    <h1>Create Receipt</h1> 
    <form action = "newRecp2.php" method ="POST">
    <Table>
            <tr>

             <tr>           
             <Td> <label>Receipt ID:</label> </td>
             <td><input type="text" name='recpID' placeholder="(R00-R99)" required></tr>       
            
             <tr><td>
             <label for="IC"><b>Buyer IC:</b></label> </td><td>
            <select name = "IC" >
            <?php
		    include 'conn.php';
            $result = $con->query("SELECT IC FROM buyer ORDER BY IC");
            while($row = $result->fetch_assoc())
            {
                $IC= $row['IC'];

                echo "<option value=$IC>$IC</option>";
            }
            ?> 
            </select>
            </tr>
        
             
             <tr>
             <Td> <label>Date :</label> </td>
             <td><input type='date' name='date'  ></td></tr>
             <tr>
             </tr> 

             </table>
             <br>
             <input type ="submit" value = "Create">
        </form>
    <p>
    

    <form action="admin.php" method="POST">
    <label for="recpID"></label><br>
    <input type="hidden" name="recpID" value='<?php print $recp; ?>'><br> <br>
     
    <input type="submit" value="Return"><br><br>
    <a href="newBuyer.php">Buyer IC not found?</a>