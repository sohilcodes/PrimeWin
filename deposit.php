<?php include "db.php"; ?>
<link rel="stylesheet" href="style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<h2>Deposit</h2>

<button onclick="setAmount(200)">₹200</button>
<button onclick="setAmount(500)">₹500</button>

<input id="amount" placeholder="Enter amount">
<button onclick="gen()">Pay</button>

<div id="qr"></div>

<form method="POST">
<input name="utr" placeholder="UTR">
<input type="hidden" name="amount" id="amt">
<button name="submit">Submit</button>
</form>

<script>
function setAmount(v){document.getElementById('amount').value=v;}

function gen(){
let amt=document.getElementById('amount').value;
document.getElementById('amt').value=amt;
let upi=`upi://pay?pa=sohilkhan21@fam&pn=PrimeWin&am=${amt}&cu=INR`;

document.getElementById("qr").innerHTML="";
new QRCode(document.getElementById("qr"), upi);

window.location.href=upi;
}
</script>

<?php
if(isset($_POST['submit'])){
mysqli_query($conn,"INSERT INTO deposits(user_id,amount,utr,status)
VALUES('{$_SESSION['uid']}','{$_POST['amount']}','{$_POST['utr']}','pending')");
}
?>
