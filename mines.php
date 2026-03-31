<?php include "../db.php";
$s=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM game_settings"));

$res=(rand(1,100)<=$s['mines_chance'])?1:0;
echo ($res)?"💣 Boom":"💎 Win";
?>
