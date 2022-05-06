<html>
<head>
<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid silver;
}
td{
padding:10px;
}
</style>
</head>
<body>
<?php 
include 'conn.php';
include 'rate.php';
$id=$_POST["id"];
$network_code=$_POST["network_code"];
$network_title=$_POST["network_title"];
$phone=$_POST["phone"];
$amount=$_POST["amount"];
new_order($id,$phone,$amount,$network_code,$network_title,$servername, $username, $password, $dbname);
?>
<table id="tb_confs">
  <tr>
    <td>Phone Number</td>
    <td><?php echo $phone?></td>
  </tr>
  
    <tr>
    <td>Amount</td>
    <td><?php echo $amount?></td>
  </tr>
  
      <tr>
    <td>Network</td>
    <td><?php echo $network_title?></td>
  </tr>
  
</table>
<?php 
$ngn=$amount;
$amount=number_format($amount/$rate,2);
$dis=$network_title.'(NGN'.$ngn.')';
?>
<form name="prompt-cash-form" action="https://prompt.cash/pay" method="get">
    <input type="hidden" name="token" value="425-MMqrIkwO">
    <input type="hidden" name="tx_id" value="<?php echo $id?>">
    <input type="hidden" name="amount" value="<?php echo $amount?>">
    <input type="hidden" name="currency" value="USD">
    <input type="hidden" name="desc" value="<?php echo $dis?>">
    <input type="hidden" name="return" value="https://a2ctech.net/pay/paysat/success.php?id=<?php echo $id?>">
    <input type="hidden" name="callback" value="http://your-store.com/api/v1/update-payment">
    <button type="submit" class="btn btn-primary" id="pay_with_bch">Pay with BitcoinCash (BCH)</button>
</form>
</body>
</html>
<?php 
function new_order($id,$phone,$amount,$network,$network_title,$servername, $username, $password, $dbname){
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO airtime_payment (id,phone,amount,network,network_title,status,t_type)
VALUES ('$id', '$phone', '$amount','$network', '$network_title', 'Pending','Airtime')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Confirm order";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}



?>