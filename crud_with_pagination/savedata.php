<?php
	$name=$_POST['sname'];
	$address=$_POST['saddress'];
	$phone=$_POST['sphone'];
	$class=$_POST['class'];
	$conn=mysqli_connect('localhost','root','','crud') or die("Connection Falied");
    $query="INSERT INTO student(sname,saddress,sphone,sclass) values('{$name}','{$address}','{$phone}','{$class}')";
    $result= mysqli_query($conn,$query) or die("Query Failed");
    header('Location:http://localhost/crud/index.php');
    mysqli_close($conn);
?>