<?php include "../db.php";

if(!isset($_SESSION['admin'])) header("Location:index.php");

echo "<h2>Admin</h2>";

$q=mysqli_query($conn,"SELECT * FROM deposits WHERE status='pending'");
while($d=mysqli_fetch_assoc($q)){
echo "{$d['amount']}
<a href='?ok={$d['id']}'>OK</a><br>";
}

if(isset($_GET['ok'])){
$d=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM deposits WHERE id=".$_GET['ok']));
mysqli_query($conn,"UPDATE users SET balance=balance+{$d['amount']} WHERE id={$d['user_id']}");
mysqli_query($conn,"UPDATE deposits SET status='approved' WHERE id=".$_GET['ok']);
}
?>
