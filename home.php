<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
session_start();
?>
<script>
function addtocart(item){
alert(item);
<?php $prid="<script>document.writeln(document.getElementById('"+item+"').innerHTML);</script>"; ?>
<?php
$ci=$_SESSION['cid'];
$pi=$_SESSION['pid'];
?>
<?php
$ff ="<script>document.write(title)</script>"; 
$con=mysqli_connect("localhost","root","root","foodordering");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "insert into orders(pid,cid,odate,quantity,deliverystatus) values ($prid,$ci,'2017-12-08 00:00:00','1','0')";
?>
<?php
//$result = mysqli_query($con,"insert into orders(pid,cid,odate,quantity,deliverystatus) values ($ci,$pi,'2017-12-08 00:00:00','1','0')") ;
if ($con->query($sql) === TRUE) {
    echo "successfully";
} else {
    echo "Error creating table: " . $con->error;
}
?>

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
	  <li><a href="myorders.php">My Orders</a></li>
        <li class="last"><a href="updatedeliverystatus.php">Cart Items</a></li>
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
          <!--<table border="1" style="width: 100%;border-collapse: collapse;border: 1px solid black;tr:nth-child(even) {background-color: #f2f2f2;}">
			<tr style="color:black;">
				<th>Item Name</th>
				<th>Description</th>
				<th>Price</th>
				<th></th>
			</tr>
			<tr style="color:black">
				<td>Name</td>
				<td>Address</td>
				<td>Phone Number</td>
				<td><a style="background:none;color:black;text-decoration:underline">Add to Cart</a></td>
			</tr>
			<tr style="color:black">
				<td>Name</td>
				<td>Address</td>
				<td>Phone Number</td>
				<td><a style="background:none;color:black;text-decoration:underline">Add to Cart</a></td>
			</tr>

		  </table>-->
<?php
$con=mysqli_connect("localhost","root","root","foodordering");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM products");
?>
<font<a style="background:none;color:black;text-decoration:underline">
<?php
echo "<table border='1'>
<tr>
<th>name</th>
<th>Description</th>
<th>price</th>
<th></th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['description'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
$_SESSION['pid']= $row["pid"];
?>
<td>
<input type="hidden" value="<?php echo "" . $row['pid'] ?>" id="<?php echo "" . $row['pid'] ?>"/>
<a style="background:none;color:black;text-decoration:underline" onClick="addtocart(<?php echo "" . $row['pid'] ?>)">Order Item</a>
</td>
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
