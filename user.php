<style>
      input.right {
        float: right  ;
      }
    </style>
<html>

<?php

	include 'conn.php';
	include 'checkU.php';
	echo "<a href='deleteAcc.php' onClick=\"return confirm('Are you sure want to Delete your User Account?')\"  >DELETE USER ACCOUNT</a>";
?>

<input type="button" onclick="location.href='logout.php';"value="LOG OUT"  class="right">
<input type="button" onclick="location.href='cPass.php';"value="Change User Password"  class="right">


<h2>User Search Page</h2>
<p>Welcome back, <?=$_SESSION['name']?>!</p>




<form action="user.php" method="post">
  <label for="recpID">Please insert your Receipt ID :</label><br>
  <input type="text" name="recpID" maxlength="5" required ><br>
  
    <br><br>
    <input type="submit" value="Find">

    <input type="button" onclick="location.href='insertu.php';"value="Add Item">
	  <br><br><br><br>
	<input type="button" onclick="location.href='productu.php';"value="View All Product">
  
</form> 
</html>
<?php
                $recp = $_POST["recpID"];
                if($recp==null)
                {
                    $recp = "--";
                }
                else
                {
                    $_SESSION['recpID'] = $recp;

                }



                $record= "  SELECT buyer.name,receipt.date FROM receipt
				 INNER JOIN buyer ON buyer.IC=receipt.IC 
				 WHERE receipt.recpID = '$recp' ";

	 			$result= $con->query($record);
				$row = $result->fetch_assoc();
				$date= $row['date'];
				$buyer= $row['name'];

				
                echo " <h3>Receipt ID :".$recp." </h3>";
				echo " <h3>Date :".$date."</h3>";
				echo " <b>Buyer Name : ".$buyer."</b>   ";
?>
<input type="button" onclick="location.href='cName.php';"value="Change Name" >
<br>


<?php
				
                echo "<table border='1'>";
                echo "<tr>";
				echo "<th>Product ID</th>";
                echo "<th>Product Name</th>";
                echo "<th> Brand </th>";
				echo "<th> Price </th>";
				echo "<th> Quantity </th>";
				echo "<th> Total </th>";
                echo "</tr>";
				

				$record= "  SELECT purchase.pID,product.proID,product.pName,brand.brandName,product.price,purchase.quantity,product.price*purchase.quantity AS total FROM purchase
				 INNER JOIN receipt ON receipt.recpID=purchase.recpID 
				 INNER JOIN buyer ON buyer.IC=receipt.IC 
				 INNER JOIN product ON product.proID=purchase.proID
				 INNER JOIN brand ON brand.brandID=product.brandID
				 WHERE receipt.recpID = '$recp' ";
	
                $result= $con->query($record);
				
                while($row = $result->fetch_assoc()) {
					$proID= $row['proID'];
                    $pName= $row['pName'];
                    $bName= $row['brandName'];
					$price= $row['price'];
					$quantity= $row['quantity'];
					$total= $row['total'];
    
                    echo "<tr>";
					echo "<td>$proID</td>";
                    echo "<td>$pName</td>";
                    echo "<td>$bName</td>";
					echo "<td>RM $price</td>";
					echo "<td> x $quantity</td>";
					echo "<td>RM $total</td>";
					echo "<td> <a href='deleteu.php?proID=".$row['proID']."' onClick=\"return confirm('Please Make Sure Inform the cashier')\">DELETE</a></td>";
					
                    echo "</tr>";
                
                }

				$record = null;
				$record= " SELECT SUM(product.price*purchase.quantity) AS summ FROM purchase
				INNER JOIN receipt ON receipt.recpID=purchase.recpID 
				INNER JOIN product ON product.proID=purchase.proID
				WHERE receipt.recpID = '$recp' ";
				$result= $con->query($record);
				while($row = $result->fetch_assoc()) {

                    echo "<tr>";
					echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
					echo "<td></td>";
					echo "<td>Total :</td>";
					echo "<td>RM $row[summ]</td>";
                    echo "</tr>";
				}

				?>

