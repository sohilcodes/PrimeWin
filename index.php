<?php include "db.php"; ?>
<link rel="stylesheet" href="style.css">

<h2>PrimeWin</h2>

<form method="POST">
<input name="email" placeholder="Email" required>
<input type="password" name="pass" placeholder="Password" required>
<button name="login">Login</button>
<button name="signup">Signup</button>
</form>

<?php
if(isset($_POST['signup'])){
mysqli_query($conn,"INSERT INTO users(email,password)
VALUES('{$_POST['email']}','{$_POST['pass']}')");
}

if(isset($_POST['login'])){
$q=mysqli_query($conn,"SELECT * FROM users WHERE email='{$_POST['email']}' AND password='{$_POST['pass']}'");
if(mysqli_num_rows($q)){
$_SESSION['uid']=mysqli_fetch_assoc($q)['id'];
header("Location: dashboard.php");
}
}
?>
