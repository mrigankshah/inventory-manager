<?php
include_once('inc/head.php');
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<?php if (login_check($mysqli) == true) : ?>
<?php
$_GET['currentPage'] = 'products';
include_once('inc/menu.php');
?>

<table class="table table-hover"><tr><th>ID</th><th>Name</th><th>Age</th><th>Sex</th><th>Emp_type</th></tr>

<?php 
$emp_id = $_SESSION['emp_id'];
$sql1 = "SELECT store_id, warehouse_id FROM Employees WHERE emp_id = '$emp_id' ";
$result1 = $mysqli->query($sql1);
    $store = $result1->fetch_assoc();
    $store_id = $store["store_id"];
    $warehouse_id = $store["warehouse_id"];
    $sql = "SELECT * FROM Employees WHERE store_id = '$store_id' AND warehouse_id = '$warehouse_id' ";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["emp_id"]."</td><td>".$row["name"]."</td><td>".$row["age"]."</td><td>".$row["sex"]."</td><td>".$row["emp_type"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
        }
?>

<style>
.number-columns{
  font-weight: 700 !important;
}
</style>


<?php
include_once('inc/footer.php');
?>

<?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>