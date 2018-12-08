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

<table class="table table-hover"><tr><th>ID</th><th>Name</th><th>Cost</th><th>Price</th><th>Quantity</th><th>Category</th><th>Threshold</th></tr>

<?php 
$emp_id = $_SESSION['emp_id'];
$sql1 = "SELECT store_id, warehouse_id FROM Employees WHERE emp_id = '$emp_id' ";
$result1 = $mysqli->query($sql1);
    $store = $result1->fetch_assoc();
    $store_id = $store["store_id"];
    $warehouse_id = $store["warehouse_id"];
    $sql = "SELECT * FROM Items WHERE store_id = '$store_id' AND warehouse_id = '$warehouse_id' ";
    $result = $mysqli->query($sql);
    $sum = 0;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["item_id"]."</td><td>".$row["name"]."</td><td>".$row["cost"]."</td><td>".$row["price"]."</td><td>".$row["quantity"]."</td><td>".$row["category"]."</td><td>".$row["threshold"]."</td></tr>";
            $sum = $sum + $row["price"]*$row["quantity"];
        }
        echo "</table>";
    } else {
        echo "0 results";
        }
?>
<br><br>
<center>
<div class="card text-white bg-success mb-3" style="max-width: 40rem;">
  <div class="card-header"><center> <h2>Inventory Value</h2> </center></div>
  <div class="card-body">
    <h1 class="card-title">₹<?=$sum?></h1>
  </div>
</div>
</center>

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