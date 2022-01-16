<?php
	$id=$_POST['sid'];
	$name=$_POST['sname'];
	$address=$_POST['saddress'];
	$phone=$_POST['sphone'];
	$class=$_POST['sclass'];

	$conn=mysqli_connect('localhost','root','','crud') or die("Connection Falied");



    $query="UPDATE student
	SET sname = '{$name}', saddress = '{$address}', sphone = '{$phone}',sclass = '{$class}'
	WHERE sid ='{$id}'";


    $result= mysqli_query($conn,$query) or die("Query Failed");




    header('Location:http://localhost/crud/index.php');


    mysqli_close($conn);
?>