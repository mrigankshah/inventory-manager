<?php
include_once('inc/head.php');
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();?>

<?php if (login_check($mysqli) == true) : ?>
<?php
$_GET['currentPage'] = 'update';
include_once('inc/menu.php');
$emp_id = $_SESSION['emp_id'];

if (isset($_POST['item_id'], $_POST['name'], $_POST['cost'], $_POST['price'], $_POST['quantity'], $_POST['category'], $_POST['threshold'])) {
$item_id = (int)$_POST["item_id"];
$name = $_POST["name"];
$cost = (int)$_POST["cost"];
$price = (int)$_POST["price"];
$quantity = (int)$_POST["quantity"];
$category = $_POST["category"];
$threshold = (int)$_POST["threshold"];

$sql1 = "SELECT store_id, warehouse_id FROM Employees WHERE emp_id = '$emp_id' ";
$result1 = $mysqli->query($sql1);
    $store = $result1->fetch_assoc();
    $store_id = $store["store_id"];
    $warehouse_id = $store["warehouse_id"];

$sql="UPDATE Items SET name = '$name', cost = '$cost', price = '$price', quantity = '$quantity', category = '$category', threshold = '$threshold'  WHERE item_id = '$item_id' AND store_id = '$store_id' AND warehouse_id = '$warehouse_id'";

$result = $mysqli->query($sql);

if($result){
    header("Location: update-items-1.php");
}else{
    echo "Could not process<p>";
}
} else {
    // The correct POST variables were not sent to this page. 
    header('Location: error.php?err=Could not process login');
    exit();
}
?>

<?php
include_once('inc/footer.php');
?>

<?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>