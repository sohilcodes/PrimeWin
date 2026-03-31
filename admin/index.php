<?php session_start();
if(isset($_POST['p']) && $_POST['p']=="Khansohel143"){
$_SESSION['admin']=1;
header("Location: panel.php");
}
?>
<form method="POST">
<input name="p">
<button>Login</button>
</form>
