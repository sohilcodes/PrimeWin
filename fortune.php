<?php include "../db.php";
$s=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM game_settings"));

$r=json_decode($s['fortune_json'],true);
echo "Result: ".$r[array_rand($r)]."x";
?>
