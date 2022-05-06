<?php 
include 'conn.php';
$id=$_GET["id"];
echo ' 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="css/index.css" type="text/css">';
if (isset($_GET["id"])){
    // Create connection
    //
    $phone="";	
    $amount="";
    $network="";
        $network_title="";
        $status="";
        $t_type=""; 	
        $data_size="";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM airtime_payment WHERE id='$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //phone	amount	network	network_title	status	t_type 	
            $phone= $row["phone"];
            $amount=$row["amount"];
            $network=$row["network"];
            $network_title=$row["network_title"];
            $status=$row["status"];
            $t_type=$row["t_type"];
            $data_size=$row["data_size"];
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}

if ($status=="Pending"){
    if ($t_type=="Airtime"){
        //RECHARGE API>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>...
        $url = "https://www.nellobytesystems.com/APIAirtimeV1.asp?UserID=CK100435454&APIKey=FM423VVC5828Y9BCAXOG77817WE819O6XQBM5URQ5O6V03308B6X1O3G068LV9XW&MobileNetwork=$network&Amount=$amount&MobileNumber=$phone";
        $json = file_get_contents($url);
        $json_data = json_decode($json, true);
        $status= $json_data["status"];
        $orderid=$json_data["orderid"];
        echo 'Recharge successfully';
        update_payment($id,$servername, $username, $password, $dbname);
        //CLOSE
       // echo '<img alt="" src="pix/done.webp" id="img_done"><br> Recharge Succesffully <br> ORDER ID '.$orderid;
    }elseif ($t_type=="Data"){
        //RECHARGE API>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>...
        $url="https://www.nellobytesystems.com/APIDatabundleV1.asp?UserID=CK100435454&APIKey=FM423VVC5828Y9BCAXOG77817WE819O6XQBM5URQ5O6V03308B6X1O3G068LV9XW&MobileNetwork=$network&DataPlan=$data_size&MobileNumber=$phone";

        $json = file_get_contents($url);
        $json_data = json_decode($json, true);
        $status= $json_data["status"];
        $orderid=$json_data["orderid"];
        echo 'Recharge successfully';
        update_payment($id,$servername, $username, $password, $dbname);
        //CLOSE 
    }
    
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    }

    function update_payment($id,$servername, $username, $password, $dbname){
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "UPDATE airtime_payment SET status='DONE' WHERE id='$id'";
        
        if ($conn->query($sql) === TRUE) {
            echo '

<form action="index.php" method="post">

<input type="submit" value="HOME" id="btn_proceed_data">

</form>';
        } else {
            echo "Error updating record: " . $conn->error;
        }
        
        $conn->close();
    }
?>