<?php

	include 'conn.php';
	include 'checkA.php';

$recp = $_POST["recpID"];
                if($recp==null)
                {
                    $recp = "--";
                }
                else
                {
                    $recp = $_POST["recpID"];
                    $_SESSION['recpID'] = $recp;

                }



?>
<style>
      input.right {
        float: right  ;
      }
    </style>



<html> 
<head> 
<title> Admin page </title> 

<input type="button" onclick="location.href='logout.php';"value="LOG OUT"  class="right">
<input type="button" onclick="location.href='createU.php';"value="Create User Account"  class="right">
</head> 
<body> 
<h1>AlexF Mart Database</h1> 
<p>Welcome back, <?=$_SESSION['name']?>!</p>

<form action="admin.php" method="POST">
    <label for="recpID"><b>Receipt ID</b></label>
        <select name = "recpID">
        <?php
		include 'conn.php';
        $result = $con->query("SELECT * FROM receipt");
		echo "<option value=$recp>".$recp."</option>";
        while($row = $result->fetch_assoc())
        {
            $recpID = $row['recpID'];
            echo "<option>$recpID</option>";
        }
        ?> </select><br><br>
    <div>
    <input type="submit"value="List down receipt">
	<input type="button" onclick="location.href='insert.php';"value="Add Item">
	<br><br><br>
	<input type="button" onclick="location.href='product.php';"value="View All Product">
	<input type="button" onclick="location.href='newRecp.php';"value="Create New Receipt">
	<input type="button" onclick="location.href='newBuyer.php';"value="New Customer">
	
</form>
</div>	
	<?php

				 $record= "  SELECT buyer.name,receipt.date FROM receipt
				 INNER JOIN buyer ON buyer.IC=receipt.IC 
				 WHERE receipt.recpID = '$recp' ";

	 			$result= $con->query($record);
				$row = $result->fetch_assoc();
				$date= $row['date'];
				$buyer= $row['name'];

				
                echo " <h3>Receipt ID :".$recp." </h3>";
				echo " <h3>Date :".$date."</h3>";
				echo " <h3>Buyer Name : ".$buyer."</h3>";
                echo "<table border='1'>";
                echo "<tr>";
				echo "<th>Product ID</th>";
                echo "<th>Product Name</th>";
                echo "<th> Brand </th>";
				echo "<th> Industy </th>";
				echo "<th> Price </th>";
				echo "<th> Quantity </th>";
				echo "<th> Total </th>";
                echo "</tr>";
				

				$record= "  SELECT purchase.pID,product.proID,product.pName,brand.brandName,industry.indName,product.price,purchase.quantity,product.price*purchase.quantity AS total FROM purchase
				 INNER JOIN receipt ON receipt.recpID=purchase.recpID 
				 INNER JOIN buyer ON buyer.IC=receipt.IC 
				 INNER JOIN product ON product.proID=purchase.proID
				 INNER JOIN brand ON brand.brandID=product.brandID
				 INNER JOIN industry ON industry.indID=product.indID
				 WHERE receipt.recpID = '$recp' ";
				$row = $result->fetch_assoc();
                $result= $con->query($record);
                while($row = $result->fetch_assoc()) {
					$proID= $row['proID'];
                    $pName= $row['pName'];
                    $bName= $row['brandName'];
					$indName= $row['indName'];
					$price= $row['price'];
					$quantity= $row['quantity'];
					$total= $row['total'];
    
                    echo "<tr>";
					echo "<td>$proID</td>";
                    echo "<td>$pName</td>";
                    echo "<td>$bName</td>";
					echo "<td>$indName</td>";
					echo "<td>RM $price</td>";
					echo "<td> x $quantity</td>";
					echo "<td>RM $total</td>";
					echo "<td> <a href ='edit.php?proID=".$row['proID']."'>EDIT</a></td>";
					echo "<td> <a href='delete.php?proID=".$row['proID']."' onClick=\"return confirm('Are u sure want to delete columne?')\">DELETE</a></td>";
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
					echo "<td></td>";
					echo "<td>Total :</td>";
					echo "<td>RM $row[summ]</td>";
                    echo "</tr>";
				}

				?>
	


</body> 
</html> 


