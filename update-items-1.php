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

<form action="update-items-2.php" method="post" class="centered">
Item ID: <input type="text" class="form-control" name="item_id" value="<?=$IMGNU;?>"><br>

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