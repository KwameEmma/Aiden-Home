<?php require_once('check_login.php');?>
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>
 <?php include('connect.php');?>

        <!-- Page wrapper  -->
<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Manage Bookings</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add booking</li>
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
                                <h4>Room Booking Details</h4>
                                <div class="form-validation">
                                    
                                    <form class="form-valide"  method="post" action="pages/booking.php" enctype="multipart/form-data">
                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Customer Name:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="name" required="">
                                                    <option value="">--Select Customer--</option>
                                                   <?php  
                                                            $c1 = "SELECT * FROM `tbl_customer`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"]. ',' . $row['name']. ',' . $row['contact'];?>">
                                                                        <?php echo $row['name'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }
                                                            ?>
                                                </select>
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Room Name:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control room" id="val-skill" name="roomname" required="">
                                                    <option value="">--Select Room--</option>
                                                    <?php  
                                                            $c1 = "SELECT * FROM `tbl_rooms`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"]. ',' . $row["roomname"];?>">
                                                                        <?php echo $row['roomname'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }
                                                            ?>
                                                </select>
                                            </div>
                                        </div>
                                       
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">No of Rooms<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control adultno" id="val-digits" name="norooms" placeholder="No of Rooms"  required="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Arrival Date :<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="fromdate" name="fromdate" placeholder="From Date" required="" onchange="CompareDate();" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Arrival Time :<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="time" class="form-control" id="fromtime" name="fromtime" placeholder="Arrival Time" required="" >
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Departure Date : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="todate" name="todate" placeholder="To Date" required="" onchange="CompareDate();"   >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Departure Time :<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="time" class="form-control" id="totime" name="totime" placeholder="Departure Time" required="" >
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">IDcard Type:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="idtype" required="" >
                                                    <option value="Ghana Card ID">Ghana Card ID</option>
                                                    <option value="Old Voters ID">Old Voters ID</option>
                                                    <option value="New Voters ID">New Voters ID</option>
                                                    <option value="NHIS ID">NHIS ID</option>
                                                    <option value="Passpord ID">Passport ID</option>
                                                    <option value="Deiver License No">Driver License ID</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">IDcard Number<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="idnumber" placeholder="IDcard Number" required="" >
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Payment Type:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="paymenttype" required=""  >
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
                                                <input type="number" class="form-control totalamount" id="val-digits" name="totalamount" placeholder="Total Amount" required="">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Amount Paid<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="val-digits" name="amountpaid" placeholder="Amount Paid" required="" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" id="btnValidate" name="btn_save" class="btn btn-primary">Submit</button>
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
<!-- <div class="popup popup--icon -error js_error-popup" id="show_error">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p>Enter valid date</p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div> -->

<!-- <script type="text/javascript">
    $("#fromdate, #todate").datepicker();

$("#todate").change(function () {
    var startDate = document.getElementById("fromdate").value;
    var endDate = document.getElementById("todate").value;
 
    if ((Date.parse(endDate) <= Date.parse(startDate))) {
        alert("End date should be greater than Start date");
        document.getElementById("todate").value = "";
    }
});
</script>--------------------------------- -->

-----------------------------------------
 <script type="text/javascript">
$(function(){

  
var times = {}, re = /^\d+(?=:)/;

for (var i = 13, n = 1; i < 24; i++, n++) {
  times[i] = n < 10 ? "0" + n : n
}

// from time
document.getElementById("fromtime")
.onchange = function() {
  var time = this
  , value = time.value
  , match = value.match(re)[0];
  this.nextElementSibling.innerHTML =
  (match && match >= 13 ? value.replace(re, times[match]) : value)
  + (time.valueAsDate.getTime() < 43200000 ? " AM" : " PM")
}


// to time
var totime;
document.getElementById("totime")
.onchange = function() {
  var time = this
  , value = time.value
  , match = value.match(re)[0];
  //$("#totime").val((match && match >= 13 ? value.replace(re, times[match]) : value)
  + (time.valueAsDate.getTime() < 43200000 ? " AM" : " PM"))
}



})
</script>
<!-- <script type="text/javascript" src="js/general.min.js"></script> -->