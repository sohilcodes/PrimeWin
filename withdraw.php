<?php include "db.php";
$uid=$_SESSION['uid'];
$u=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id=$uid"));

if($u['balance']>=110 && $u['wager']>=100){
?>
<form method="POST">
<input name="amount">
<button name="w">Withdraw</button>
</form>
<?php
if(isset($_POST['w'])){
mysqli_query($conn,"INSERT INTO withdraws(user_id,amount,status)
VALUES('$uid','".$_POST['amount']."','pending')");
}
}else{
echo "Complete wager!";
}
?>
