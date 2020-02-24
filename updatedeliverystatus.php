<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
session_start();
?>
<script>
function addtocart(oid,pid,cid){
alert(oid+" "+pid+" "+cid);
//update db

}
</script>
<head>
<title>ONLINE FOOD ORDERING SYSTEM</title>
<meta charset="iso-8859-1">
<link rel="stylesheet" href="styles/layout.css" type="text/css">
<style>
table { border-collapse: collapse; width: 100%;}
th, td {text-align: center;padding: 8px;}
tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="home.php">Food Ordering System</a></h1>
    </div>
    <nav>
      <ul>
	  <li><a href="#">My Orders</a></li>
        <li class="last"><a href="#">Cart Items</a></li>
      </ul>
    </nav>
    <div class="clear"></div>
  </header>
</div>
<!-- content -->
<div class="wrapper row2">
  <div id="container">
    <!-- content body -->
    
    <!-- main content -->
    <h2><font color="red">welcome <?php echo $_SESSION["email"]; ?></font></h2><br/><br/>
    <div id="content" style="width:100%">
      <!-- section 1 -->
      <section>
        <!-- article 1 -->
        <article>
          <h2><a href="">Items Available</a></h2><br/>
<?php
$con=mysqli_connect("localhost","root","root","foodordering");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"select o.oid,c.name as custname,c.address,p.name as prodname,o.quantity,o.odate from orders o join customers c on c.cid=o.cid join products p on p.pid=o.pid where o.deliverystatus = 0");
?>
<font<a style="background:none;color:black;text-decoration:underline">
<?php
echo "<table border='1'>
<tr>
<th>customer name</th>
<th>Address</th>
<th>product name</th>
<th>quantity</th>
<th>Ordered date</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['custname'] . "</td>";
echo "<td>" . $row['address'] . "</td>";
echo "<td>" . $row['prodname'] . "</td>";
echo "<td>" . $row['quantity'] . "</td>";
echo "<td>" . $row['odate'] . "</td>";
?>
<td><a style="background:none;color:black;text-decoration:underline" onclick="addtocart(<?php echo "" . $row['oid'] . "," . $row['oid'] . "," . $row['oid'] ?>)">Successfully Delivered</a></td>
<?php
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>

        </article>
    </div>
    <!-- / content body -->
    <div class="clear"></div>
  </div>
</div>
</body>
</html>
