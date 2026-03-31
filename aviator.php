<?php include "../db.php";
$s=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM game_settings"));

$mult=rand($s['aviator_min']*100,$s['aviator_max']*100)/100;
echo "Multiplier: $mult x";

if(isset($_POST['bet'])){
$bet=$_POST['bet'];
$uid=$_SESSION['uid'];

$win=($mult>2)?$bet*2:0;

mysqli_query($conn,"UPDATE users SET balance=balance+$win-$bet,wager=wager+$bet WHERE id=$uid");
}
?>
<form method="POST">
<input name="bet">
<button>Play</button>
</form>
