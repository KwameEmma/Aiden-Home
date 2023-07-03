<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');
if(isset($_POST["btn_save"])){

/*echo "<pre>"; */
extract($_POST);
//var_dump(get_defined_vars());
$roomname=explode(',',$_POST['roomname']);
/*print_r($roomname[1]); */
//$tax=explode(',',$_POST['tax']);
/*print_r($tax[1]); */
?>

<?php $earlier = new DateTime($_POST['fromdate']);
$later = new DateTime($_POST['todate']);

$diff = $later->diff($earlier)->format("%a");


    $data = explode(',',$_POST['name']);
    $cid = $data[0];
    $name = $data[1];
    $contact = $data[2];

    $datas = explode(',',$_POST['roomname']);
    $roomid = $datas[0];
    $roomname = addslashes($datas[1]);

    $amfrom = intval($_POST["fromtime"]) < 12 ? 'AM' : 'PM'; // am or pm
    $amto   = intval($_POST["totime"]) < 12 ? 'AM' : 'PM';


 
    $norooms = addslashes($_POST["norooms"]);
    $fromdate = addslashes($_POST["fromdate"]);
    $fromtime = $_POST["fromtime"] . " ". $amfrom;
    $todate = addslashes($_POST["todate"]);
    $totime = $_POST["totime"] . " ". $amto;
    $idtype = addslashes($_POST["idtype"]);
    $idnumber = addslashes($_POST["idnumber"]);
    $paymenttype = addslashes($_POST["paymenttype"]);
    $totalamount = addslashes($_POST["totalamount"]);
    $amountpaid = addslashes($_POST["amountpaid"]); 

    $days_duration = $diff;

    $balance = 0;
    $status = "";

    if($amountpaid < $totalamount){

      $balance = $totalamount - $amountpaid;
      $status = "Partial Payment";
       
    }elseif ($amountpaid >= $totalamount) {
      $balance = 0;
      $status = "Full Payment";
    }
    
  } 
	

   $sql = "INSERT INTO tbl_booking(
     `customerid`,
    `name`,
    `roomname`,
    `roomid`,
    `norooms`,
    `fromdate`,
    `fromtime`,
    `todate`,
    `totime`,
    `idtype`,
    `idnumber`,
    `paymenttype`,
    `totalamount`,
    `amountpaid`,
    `balance`,
    `status`,
    `created_date`) VALUES (

      '$cid',
      '$name',
      '$roomname',
      '$roomid',
      '$norooms',
      '$fromdate',
      '$fromtime',
      '$todate',
      '$totime',
      '$idtype',
      '$idnumber',
      '$paymenttype',
      '$totalamount',
      '$amountpaid',
      '$balance',
      '$status',
       CURDATE())";

   if ($conn->query($sql) === TRUE) {
    $_SESSION['success']=' Record Successfully Added';




    // sms implementation 

    $result = mysqli_query($conn,"SELECT * FROM aidensms WHERE id = 1");
    $row = mysqli_fetch_array($result);

    $date = date("F d, Y");

    $senderID = $row['senderID'];
    $senderEmail = $row['email'];
    $senderPassword = $row['password'];
    $senderMessage = "Thank you for your reservation at Aiden Homes And Apartments.\n
Client: $name
RoomName: $roomname
No Of Rooms: $norooms
Arrival Date: $fromdate $fromtime
Departure Date: $todate $totime
\nDate: $date\n
Feel at home, feel great.";

    include_once (__DIR__.'/ZenophSMSGH/lib/ZenophSMSGH.php');
    $zs = new ZenophSMSGH();
    $zs->setUser('aidensms@protonmail.com');
    $zs->setPassword('aidensms1');
    $zs->setMessageType(ZenophSMSGH_MESSAGETYPE::TEXT);
    $zs->setSenderId($senderID);
    $zs->SetMessage($senderMessage);
    $zs->addDestination($contact);
    $zs->addDestination("0248239906"); // aiden home manager
    $zs->sendMessage();
    
    // End of sms implementation


   ?>
<script type="text/javascript">
window.location="../view_booking.php";
</script>
<?php
} else {
    $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_booking.php";
</script>
<?php } ?>

