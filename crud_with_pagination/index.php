<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'crud') or die("Connection Falied");
    $limit = 3;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $offset = ($page - 1) * $limit;
    $query = "SELECT * from student join studentclass on student.sclass=studentclass.cid  LIMIT $offset,$limit";
    $result = mysqli_query($conn, $query) or die("Query Failed");
    if (mysqli_num_rows($result) > 0) {


    ?>
        <table cellpadding="7px">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Class</th>
                <th>Phone</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {

                ?>
                    <tr>
                        <td><?php echo $row['sid'] ?></td>
                        <td><?php echo $row['sname'] ?></td>
                        <td><?php echo $row['saddress'] ?></td>
                        <td><?php echo $row['cname'] ?></td>
                        <td><?php echo $row['sphone'] ?></td>
                        <td>
                            <a href='edit.php?id=<?php echo $row['sid'] ?>'>Edit</a>
                            <a href='delete-inline.php?id=<?php echo $row['sid'] ?>'>Delete</a>
                        </td>
                    </tr>
                <?php  }; ?>
            </tbody>
        </table>
    <?php
        $sql = "SELECT * FROM student";
        $result2 = mysqli_query($conn, $sql) or die("Query Failed");
        if (mysqli_num_rows($result2) > 0) {
            $total_records = mysqli_num_rows($result2);
            $total_page = ceil($total_records / $limit);
            echo '<div class="pagination">';
            if ($page > 1) {
                echo '<a href="index.php?page='.($page - 1).'">&laquo;</a>';
              }
            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $page) {
                    echo "<a class='active' href='index.php?page=$i'>$i</a> ";
                } else {
                    echo "<a href='index.php?page=$i'>$i</a> ";
                }
            }
            if ($page < $total_page) {
                echo '<a href="index.php?page='.($page + 1).'">&raquo;</a>';                
             }
            echo '</div>';
        }
    } else {
        echo "<h2>No Data Found</h2>";
    }
    mysqli_close($conn); ?>
</div>
</div>
</body>

</html>