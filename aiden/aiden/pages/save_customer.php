
<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');


$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];
$address = $_POST['address'];

// echo $name . " " . $email . " " . $gender . " " . $contact . " " . $address;

// exit;

$sql = "INSERT INTO tbl_customer (name,email,gender,contact,address,created_date) VALUES ('$name', '$email','$gender','$contact','$address',CURDATE())";

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_customer.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_customer.php";
</script>
<?php } ?>