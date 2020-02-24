<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodordering";


$conn = new mysqli($servername, $username, $password, $dbname);
session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  $email =$_POST["email"];
  $pass  =$_POST["pwd"];
  $_SESSION["email"]=$email;
}
/*$sql = "select pwd from customers where email='$email'";
$result = $conn->query($sql);

echo $result; */

    $sql ="select pwd,cid from customers where email='$email'";
    $result = $result = $conn->query($sql);

    if (mysqli_num_rows($result) == 1) 
    {
while($row = mysqli_fetch_array($result))
{
	$_SESSION["cid"]= $row['cid'];
      //  $_SESSION["pid"]= $row['pid'];
}
        echo "successfull login"; 
        header("Location:adminpage.php");
       exit();
    } 
    else 
    {
        echo "please enter correct email and password";  
  }




$conn->close();
?> 
