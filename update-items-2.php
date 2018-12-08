<?php
include_once('inc/head.php');
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>

<?php if (login_check($mysqli) == true) : ?>

<?php
$_GET['currentPage'] = 'incoming';
include_once('inc/menu.php');
$emp_id = $_SESSION['emp_id'];


if (isset($_POST['item_id'])) {
$item_id = (int)$_POST["item_id"];
$sql1 = "SELECT * FROM Items WHERE item_id = '$item_id' ";
$result1 = $mysqli->query($sql1);
$store = $result1->fetch_assoc();
$name = $store['name'];
$cost = $store['cost'];
$price = $store['price'];
$quantity = $store['quantity'];
$category = $store['category'];
$threshold = $store['threshold'];}
else
?>

<form action="update.php" method="post" class="centered">
<input type="hidden" name="item_id" value="<?=$item_id;?>">
Name: <input type="text" class="form-control" name="name" value="<?=$name?>"><br>
Cost: <input type="text" class="form-control" name="cost" value="<?=$cost?>"><br>
Price: <input type="text" class="form-control" name="price" value="<?=$price?>"><br>
Quantity: <input type="text"  class="form-control" name="quantity" value="<?=$quantity?>"><br>
Category: <input type="text" class="form-control" name="category" value="<?=$category?>"><br>
Threshold: <input type="text" class="form-control" name="threshold" value="<?=$threshold?>"><br>

<input type="Submit" class="btn btn-primary">
</form>

<style>
.number-columns{
	font-weight: 700 !important;
}

<?php
include_once('inc/footer.php');
?>

<?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>