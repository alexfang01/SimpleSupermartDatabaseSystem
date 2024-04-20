<?php

	include 'conn.php';
	include 'checkA.php';
?>

<h1>Edit data Page</h1> 

<?php
    $proID = $_GET['proID'];
    $recp = $_SESSION['recpID'];
    $sql ="  SELECT purchase.pID,product.pName,brand.brandName,product.price,purchase.quantity FROM purchase      
    INNER JOIN receipt ON receipt.recpID=purchase.recpID 
    INNER JOIN buyer ON buyer.IC=receipt.IC 
    INNER JOIN product ON product.proID=purchase.proID
    INNER JOIN brand ON brand.brandID=product.brandID
    WHERE receipt.recpID = '$recp' AND product.proID = '$proID'";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

    $pID = $row['pID'];
    $quantity = $row['quantity'];                                                                                     
    ?>

    <form action = "edit2.php" method ="POST">
    <Table>
            <tr>
            
            
            <tr>           
             <Td> <label>Purchase ID:</label> </td>
             <td><input type="hidden" name='pID' value ='<?php print $pID; ?>'</td> <?php echo $pID;?></tr>


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
             <td><input type='text' name='quantity' value ='<?php print $quantity;?>' maxlength="5" ></td></tr>
             <tr>
             </tr> 

             </table>
         
    
    <input type ="submit" value = "Edit Purchase">
        </form>
        
    <form action="admin.php" method="POST">
    <label for="recpID"></label><br>
    <input type="hidden" name="recpID" value='<?php print $recp; ?>'><br><br>
    <input type="submit" value="Return">
