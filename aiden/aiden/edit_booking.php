<?php require_once('check_login.php');?>
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

if(isset($_POST["submit"])){

    $name = addslashes($_POST["name"]);
    $roomname = addslashes($_POST["roomname"]);
    $norooms = addslashes($_POST["norooms"]);
    $fromdate = addslashes($_POST["fromdate"]);
    $fromtime = addslashes($_POST["fromtime"]);
    $todate = addslashes($_POST["todate"]);
    $totime = addslashes($_POST["totime"]);
    $idtype = addslashes($_POST["idtype"]);
    $idnumber = addslashes($_POST["idnumber"]);
    $paymenttype = addslashes($_POST["paymenttype"]);
    $totalamount = addslashes($_POST["totalamount"]);
    $amountpaid = addslashes($_POST["amountpaid"]); 



    $balance = 0;
    $status = "";

    if($amountpaid < $totalamount){

      $balance = $totalamount - $amountpaid;
      $status = "Partial Payment";
       
    }elseif ($amountpaid >= $totalamount) {
      $balance = 0;
      $status = "Full Payment";
    }


    $q1="UPDATE `tbl_booking` SET 
 

    `name` = '$name',
    `roomname` = '$roomname',
    `norooms` = '$norooms',
    `fromdate` = '$fromdate',
    `fromtime` = '$fromtime',
    `todate` = '$todate',
    `totime` = '$totime',
    `idtype` = '$idtype',
    `idnumber` = '$idnumber',
    `paymenttype` = '$paymenttype',
    `totalamount` = '$totalamount',
    `amountpaid` = '$amountpaid',
    `balance` = '$balance',
    `status` = '$status' WHERE `id`='".$_GET['id']."'";

    if ($conn->query($q1) === TRUE) { echo "string";
      $_SESSION['success']=' Record Successfully Updated';
     ?>
<script type="text/javascript">
window.location="view_booking.php";
</script>
<?php
} else {

      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_booking.php";
</script>
<?php
}
}
?>

<?php
$que="SELECT * FROM `tbl_booking` WHERE id ='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query)){

$name = $row['name'];
$roomname = $row['roomname'];
$norooms = $row['norooms'];
$fromdate = $row['fromdate'];
$fromtime = $row['fromtime'];
$todate = $row['todate'];
$totime = $row['totime'];
$idtype = $row['idtype'];
$idnumber = $row['idnumber'];
$paymenttype = $row['paymenttype'];
$totalamount = $row['totalamount'];
$amountpaid = $row['amountpaid'];
$balance = $row['balance'];



}

?>         <!-- Page wrapper  -->
<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Manage Bookings</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Booking</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->     
                                
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                              
                                <div class="form-validation">
                                    
                                <form class="form-valide"  method="post" enctype="multipart/form-data">
                                         
                                <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Customer name<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control adultno" value="<?=$name;?>" id="val-digits" name="name" placeholder="Customer name"  required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits" >Room Name<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control adultno" value="<?=$roomname;?>" id="val-digits" name="roomname" placeholder="Room name"  required="">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits" >No of Rooms<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control adultno" value="<?=$norooms;?>" id="val-digits" name="norooms" placeholder="No of Rooms"  required="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Arrival Date :<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="fromdate" name="fromdate"  value="<?=$fromdate;?>" placeholder="From Date" required="" onchange="CompareDate();" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Arrival Time :<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="fromtime" value="<?=$fromtime;?>" name="fromtime" placeholder="Arrival Time" required="" >
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Departure Date : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="todate" value="<?=$todate;?>" name="todate" placeholder="To Date" required="" onchange="CompareDate();"   >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Departure Time :<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="totime" value="<?=$totime;?>" name="totime" placeholder="Departure Time" required="" >
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">IDcard Type:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="idtype" required="" >
                                                    <option value="<?=$idtype;?>"><?=$idtype;?></option>
                                                    <option value="Ghana Card">Ghana Card ID</option>
                                                    <option value="Old Voters ID">Old Voters ID</option>
                                                    <option value="New Voters ID">New Voters ID</option>
                                                    <option value="NHIS ID">NHIS ID</option>
                                                    <option value="Passpord Number">Passport ID</option>
                                                    <option value="Deiver License No">Driver License ID</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">IDcard Number<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits"value="<?=$idnumber;?>" name="idnumber" placeholder="IDcard Number" required="" >
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Payment Type:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="paymenttype" required=""  >
                                                    <option value="<?=$paymenttype;?>"><?=$paymenttype;?></option>
                                                    <option value="Cash">Cash</option>    
                                                    <option value="Mobile Nmoney">Mobile Money (MOMO)</option>
                                                    <option value="Credit Card">Credit Card</option>
                                                    <option value="Cheque">Cheque</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Total Amount Payable<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control totalamount" value="<?=$totalamount;?>" id="val-digits" name="totalamount" readonly placeholder="Total Amount" required="">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Amount Paid<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="val-digits" value="<?=$amountpaid;?>" name="amountpaid" placeholder="Amount Paid" required="" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" id="btnValidate" name="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
                <!-- /# row -->
                <!-- End PAge Content -->
        </div>
            <!-- End Container fluid  -->
            <!-- End Bread crumb -->
 
<?php include('footer.php');?>

