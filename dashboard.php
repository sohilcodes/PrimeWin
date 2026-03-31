<?php include "db.php";
$id=$_SESSION['uid'];
$user=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id=$id"));
?>
<link rel="stylesheet" href="style.css">

<h2>Balance: ₹<?php echo $user['balance']; ?></h2>

<a href="deposit.php">Deposit</a>
<a href="withdraw.php">Withdraw</a>
<a href="logout.php">Logout</a>

<h3>Games</h3>
<a href="games/aviator.php">Aviator</a>
<a href="games/mines.php">Mines</a>
<a href="games/fortune.php">Fortune</a>
