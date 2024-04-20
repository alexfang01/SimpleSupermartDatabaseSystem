<?php

include 'conn.php';
include 'checkU.php';
$recp = $_SESSION['recpID'];
?>

<style>
      input.right {
        float: right  ;
      }
    </style>

<html> 
<head> 
<title> Products list </title> 

<input type="button" onclick="location.href='logout.php';"value="LOG OUT"  class="right">
</head> 
<body> 
<h1>Products list</h1> 

	
	<?php
                echo "<table border='1'>";
                echo "<tr>";
				echo "<th>Product ID</th>";
                echo "<th>Product Name</th>";
                echo "<th> Brand </th>";
				echo "<th> Industy </th>";
                echo "<th> Industy Address</th>";
				echo "<th> Price </th>";
                echo "</tr>";
				

				$record= "  SELECT product.proID,product.pName,brand.brandName,industry.indName,industry.indAddress,product.price FROM product
                 INNER JOIN industry ON industry.indID=product.indID
				 INNER JOIN brand ON brand.brandID=product.brandID
                 ORDER BY product.proID ";

                $result= $con->query($record);
				$row = $result->fetch_assoc();
                
                while($row = $result->fetch_assoc()) {
					$proID= $row['proID'];
                    $pName= $row['pName'];
                    $bName= $row['brandName'];
					$indName= $row['indName'];
                    $indAddress= $row['indAddress'];
					$price= $row['price'];
                    
                    echo "<tr>";
					echo "<td>$proID</td>";
                    echo "<td>$pName</td>";
                    echo "<td>$bName</td>";
					echo "<td>$indName</td>";
                    echo "<td>$indAddress</td>";
					echo "<td>$price</td>";
                    echo "</tr>";
                
                }


				?>
	

    <form action="user.php" method="POST">
    <label for="recpID"></label><br>
    <input type="hidden" name="recpID" value='<?php print $recp; ?>'><br><br>
    <input type="submit" value="Return">
</body> 
</html> 