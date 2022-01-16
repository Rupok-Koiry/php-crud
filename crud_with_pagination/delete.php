<?php include 'header.php'; ?>


<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="delete.php" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
   </div>
   <?php
    if (isset($_POST['deletebtn'])) {
        $conn=mysqli_connect('localhost','root','','crud') or die("Connection Falied");
        $stu_id=$_POST['sid'];
        $query="DELETE FROM student
				WHERE sid='{$stu_id}'";
        $result= mysqli_query($conn,$query) or die("Query Failed");
     header('Location:http://localhost/crud/index.php');
    mysqli_close($conn);}
   ?>
</div>
</div>
</body>
</html>
