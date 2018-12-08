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
?>

<form action="add.php" method="post" class="centered">
<input type="hidden" name="emp_id" value="<?=$emp_id;?>">
Item ID: <input type="text" class="form-control" name="item_id" value="<?=$IMGNU;?>"><br>
Name: <input type="text" class="form-control" name="name" value="<?=$firstname?>"><br>
Cost: <input type="text" class="form-control" name="cost" value="<?=$surname?>"><br>
Price: <input type="text" class="form-control" name="price" value="<?=$FBID?>"><br>
Quantity: <input type="text"  class="form-control" name="quantity" value="<?=$FBID?>"><br>
Category: <input type="text" class="form-control" name="category" value="<?=$FBID?>"><br>
Threshold: <input type="text" class="form-control" name="threshold" value="<?=$FBID?>"><br>

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