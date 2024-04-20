<?php
    include 'conn.php';
    include 'checkA.php';
    $recp = $_SESSION['recpID'];
    
    
    $sql ="SELECT*FROM purchase ";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

    $pID = $row['pID'];                                                                                     
    ?>
    <h1>Insert Item : <?php echo $recp; ?></h1> 
    <form action = "insert2.php" method ="POST">
    <Table>
            <tr>

             <tr>           
             <Td> <label>Receipt ID:</label> </td>
             <td><input type="hidden" name='recpID'value ='<?php print $recp; ?>'</td> <?php echo $recp;?></tr>       
            
             <tr><td>
             <label for="proID"><b>Product ID</b></label> </td><td>
            <select name = "proID" >
            <?php
		    include 'conn.php';
            $result = $con->query("SELECT proID FROM product ORDER BY proID");
            echo "<option value=$proID>$proID</option>";
            while($row = $result->fetch_assoc())
            {
                $proIDD= $row['proID'];

                echo "<option value=$proIDD>$proIDD</option>";
            }
            ?> 
            </select>
            </tr>
        
             
             <tr>
             <Td> <label>Quantity :</label> </td>
             <td><input type='text' name='quantity' maxlength="5" ></td></tr>
             <tr>
             </tr> 

             </table><br>
             <input type ="submit" value = "Add to Cart">
        </form>
    <p>
    

    <form action="admin.php" method="POST">
    <label for="recpID"></label><br>
    <input type="hidden" name="recpID" value='<?php print $recp; ?>'><br><br>
    <input type="submit" value="Return">