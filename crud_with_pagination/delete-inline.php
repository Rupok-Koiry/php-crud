<?php
$stu_id=$_GET['id'];
$conn=mysqli_connect('localhost','root','','crud') or die("Connection Falied");
 $query="DELETE FROM student
WHERE sid='{$stu_id}'";
 $result= mysqli_query($conn,$query) or die("Query Failed");
   header('Location:http://localhost/crud/index.php');
    mysqli_close($conn);
?>