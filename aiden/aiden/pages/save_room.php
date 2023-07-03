
<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');

//extract($_POST);

$floorno = addslashes($_POST['floorno']);
$roomname = addslashes($_POST['roomname']);

$peradultprice = "";
$perkidprice = "";
$color = "default";

   $sql = "INSERT INTO `tbl_rooms`(`floorno`, `roomname`, `peradultprice`, `perkidprice`,`color`) VALUES ('$floorno', '$roomname', '$peradultprice', '$perkidprice', '$color')";

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_room.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_room.php";
</script>
<?php } ?>