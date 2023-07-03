<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Aiden Homes & Apartments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<script>
    $(function(){
      $(".print").click(function(){
        $(".print").hide();
        print();
        $(".print").show();
      })
    })
</script>

<?php

include('connect.php');
$id = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM tbl_booking WHERE id = '$id'");
$row = mysqli_fetch_array($result);

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

?>

<div class="page-content container">
    <div class="page-header text-blue-d2">
    
        <div class="page-tools">
            <div class="action-buttons">
                <a class="btn bg-white btn-light mx-1px text-95 print" href="#" data-title="Print">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </a>
                <!-- <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    Export
                </a> -->
            </div>
        </div>
    </div>

    <div class="container px-0">
        <div class="row mt-0">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            
                            <span class="text-default-d3">Reservation Form</span>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <img src="images/aiden.jpeg" width="190px" height="150px">
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                <b>Aiden Homes & Apartments</b>
                            </div>
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                            <b>Phone No</b> 0599181742 | 0501723285
                            </div>

                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                            <b>Email Address:</b> info@aidenhapartments.com
                            </div>

                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                            <b>Location Address:</b> Two Streams<br>Mangoase Junction Koforidua
                            </div>

                          
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                   
                <hr class="style2" style="background-color:black;height:2px;">


                                        <?php

                                        include "connect.php";
                                        $id = $_GET['id'];
                                

                                        $que="SELECT * FROM `tbl_booking` WHERE id ='$id'";
                    $query=$conn->query($que);
                    $row=mysqli_fetch_array($query);

                    $name = $row['name'];
                    $customerid = $row['customerid'];
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
                    $date = $row['created_date'];

                    $result = mysqli_query($conn,"SELECT * FROM tbl_customer WHERE id = '$customerid'");
                    $get = mysqli_fetch_array($result);

                    $contact = $get['contact'];
                    $location = $get['address'];
                    $email = $get['email'];

                    ?>

                    <div class="text-95 text-secondary-d3">
                        <div class="row mb-1 mb-sm-0 py-20">
                            <div class="col-12 col-sm-5">Customer Name <input type="text" value="<?=$name;?>" style="border:none;border-bottom:solid 1px black;text-align: left; position:relative;left:20px;"readonly></div>
                            <div class="col-12 col-sm-5 d-flex justify-content-end" style="position:relative;left:115px;">Date Created <input type="" value="<?=$date;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:20px;"readonly></div>
                         </div>

                        <div class="row mb-2 mb-sm-0 py-20">
                            <div class="col-9 col-sm-5">Email Address<input type="text"  value="<?=$email;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:40px;"readonly></div>
                            <div class="col-12 col-sm-5 d-flex justify-content-end" style="position:relative;left:115px;">Phone No. <input type="" value="<?=$contact;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:20px;"readonly></div>
                        </div>

                        <div class="row mb-2 mb-sm-0 py-20">
                            <div class="col-9 col-sm-5">Location Address<input type="text" value="<?=$location;?>" style="border:none;border-bottom:solid 1px black;text-align: lrft;position:relative;left:17px;"readonly></div>
                        </div>

                        <div class="row mb-2 mb-sm-0 py-20">
                            <div class="col-9 col-sm-5">Arrival Date<input type="text" value="<?=$fromdate;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:60px;"readonly></div>
                            <div class="col-12 col-sm-5 d-flex justify-content-end"style="position:relative;left:115px;">Arrival Time. <input type="text" value="<?=$fromtime;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:20px;"readonly></div>
                        </div>

                        <div class="row mb-2 mb-sm-0 py-20">
                            <div class="col-9 col-sm-5">Departure Date<input type="text" value="<?=$todate;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:33px;"readonly></div>
                            <div class="col-12 col-sm-5 d-flex justify-content-end"style="position:relative;left:115px;">Departure Time. <input type="text" value="<?=$totime;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:20px;"readonly></div>
                        </div>

                        <hr class="style2" style="background-color:black;height:2px;">

                        <div class="row mb-2 mb-sm-0 py-20">
                            <div class="col-9 col-sm-5">Room Name<input type="text" value="<?=$roomname;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:55px;"readonly></div>
                            <div class="col-12 col-sm-5 d-flex justify-content-end"style="position:relative;left:115px;">No. Of rooms <input type="text" value="<?=$norooms;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:20px;"readonly></div>
                        </div>
                        <span>All rooms comes with breakfast and fully furnished Kitchen, DStv and Wifi</span>
                    </div>

                    <hr class="style2" style="background-color:black;height:2px;">

                    <div class="row mb-2 mb-sm-0 py-20">
                            <div class="col-9 col-sm-5">Amount Due<input type="text" value="₵ <?=$totalamount;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:50px;"readonly></div>
                            <div class="col-12 col-sm-5 d-flex justify-content-end"style="position:relative;left:115px;">Amount Paid <input type="text" value="₵ <?=$amountpaid;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:20px;"readonly></div>
                        </div>

                        <div class="row mb-2 mb-sm-0 py-20">
                            <div class="col-9 col-sm-5"><b>Total Cost</b><input type="text" value="₵ <?=$totalamount;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:62px;"readonly></div>
                        </div>

                        <hr class="style2" style="background-color:black;height:2px;">

                        <div class="row mb-2 mb-sm-0 py-20">
                        <div class="col-9 col-sm-5">Customer Sign.<input type="" id="totalamount" style="border:none;border-bottom:solid 1px black;position:relative;left:35px;"></div>
                            <div class="col-12 col-sm-5 d-flex justify-content-end"style="position:relative;left:115px;">Receptionist Sign. <input type="" id="amountpaid" style="border:none;border-bottom:solid 1px black;position:relative;left:20px;"></div>
                        </div>

                        

                </div>
            </div>
        </div>
    </div>

    <br><br>
    <hr class="style5" style="background-color:black;height:2px;">



    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            
                            <span class="text-default-d3">Reservation Form</span>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <img src="images/aiden.jpeg" width="190px" height="150px">
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                <b>Aiden Homes & Apartments</b>
                            </div>
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                            <b>Phone No</b> 0599181742 | 0501723285
                            </div>

                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                            <b>Email Address:</b> info@aidenhapartments.com
                            </div>

                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                            <b>Location Address:</b> Two Streams<br>Mangoase Junction Koforidua
                            </div>

                          
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                   
                <hr class="style2" style="background-color:black;height:2px;">


                                        <?php

                                        include "connect.php";
                                        $id = $_GET['id'];
                                

                                        $que="SELECT * FROM `tbl_booking` WHERE id ='$id'";
                    $query=$conn->query($que);
                    $row=mysqli_fetch_array($query);

                    $name = $row['name'];
                    $customerid = $row['customerid'];
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
                    $date = $row['created_date'];

                    $result = mysqli_query($conn,"SELECT * FROM tbl_customer WHERE id = '$customerid'");
                    $get = mysqli_fetch_array($result);

                    $contact = $get['contact'];
                    $location = $get['address'];
                    $email = $get['email'];

                    ?>



                    <div class="text-95 text-secondary-d3">
                        <div class="row mb-1 mb-sm-0 py-20">
                            <div class="col-12 col-sm-5">Customer Name <input type="text" value="<?=$name;?>" style="border:none;border-bottom:solid 1px black;text-align: left; position:relative;left:20px;" readonly></div>
                            <div class="col-12 col-sm-5 d-flex justify-content-end" style="position:relative;left:115px;">Date Created <input type="" value="<?=$date;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:20px;"readonly></div>
                         </div>

                        <div class="row mb-2 mb-sm-0 py-20">
                            <div class="col-9 col-sm-5">Email Address<input type="text"  value="<?=$email;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:40px;"readonly></div>
                            <div class="col-12 col-sm-5 d-flex justify-content-end" style="position:relative;left:115px;">Phone No. <input type="" value="<?=$contact;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:20px;"readonly></div>
                        </div>

                        <div class="row mb-2 mb-sm-0 py-20">
                            <div class="col-9 col-sm-5">Location Address<input type="text" value="<?=$location;?>" style="border:none;border-bottom:solid 1px black;text-align: lrft;position:relative;left:17px;"readonly></div>
                        </div>

                        <div class="row mb-2 mb-sm-0 py-20">
                            <div class="col-9 col-sm-5">Arrival Date<input type="text" value="<?=$fromdate;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:60px;"readonly></div>
                            <div class="col-12 col-sm-5 d-flex justify-content-end"style="position:relative;left:115px;">Arrival Time. <input type="text" value="<?=$fromtime;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:20px;"readonly></div>
                        </div>

                        <div class="row mb-2 mb-sm-0 py-20">
                            <div class="col-9 col-sm-5">Departure Date<input type="text" value="<?=$todate;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:33px;"readonly></div>
                            <div class="col-12 col-sm-5 d-flex justify-content-end"style="position:relative;left:115px;">Departure Time. <input type="text" value="<?=$totime;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:20px;"readonly></div>
                        </div>



                        <hr class="style2" style="background-color:black;height:2px;">



                        <div class="row mb-2 mb-sm-0 py-20">
                            <div class="col-9 col-sm-5">Room Name<input type="text" value="<?=$roomname;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:55px;"readonly></div>
                            <div class="col-12 col-sm-5 d-flex justify-content-end"style="position:relative;left:115px;">No. Of rooms <input type="text" value="<?=$norooms;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:20px;"readonly></div>
                        </div>
                        <span>All rooms comes with breakfast and fully furnished Kitchen, DStv and Wifi</span>
                    </div>

                    <hr class="style2" style="background-color:black;height:2px;">

                    <div class="row mb-2 mb-sm-0 py-20">
                            <div class="col-9 col-sm-5">Amount Due<input type="text" value="₵ <?=$totalamount;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:50px;"readonly></div>
                            <div class="col-12 col-sm-5 d-flex justify-content-end"style="position:relative;left:115px;">Amount Paid <input type="text" value="₵ <?=$amountpaid;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:20px;"readonly></div>
                        </div>

                        <div class="row mb-2 mb-sm-0 py-20">
                            <div class="col-9 col-sm-5"><b>Total Cost</b><input type="text" value="₵ <?=$totalamount;?>" style="border:none;border-bottom:solid 1px black;text-align: left;position:relative;left:62px;"readonly></div>
                        </div>

                        <hr class="accessory" style="background-color:black;height:2px;">

                        <div class="row mb-2 mb-sm-0 py-20">
                        <div class="col-9 col-sm-5">Customer sign.<input type="" id="totalamount" style="border:none;border-bottom:solid 1px black;position:relative;left:35px;"></div>
                            <div class="col-12 col-sm-5 d-flex justify-content-end"style="position:relative;left:115px;">Receptionist sign.<input type="" id="amountpaid" style="border:none;border-bottom:solid 1px black;position:relative;left:20px;"></div>
                        </div>

                        <br><br>

                </div>
            </div>
        </div>
    </div>

</div>


<style type="text/css">
body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}

hr.style2 {
	border-top: 3px double #8c8b8b;
}

hr.style5 {
	background-color: #fff;
	border-top: 2px dashed #8c8b8b;
}


.accessory {
    height: 6px;
    background-image: radial-gradient(closest-side, gray, rgba(128, 128, 128, 0) 100%);
    position: relative;
}




















</style>

<script type="text/javascript">

</script>
</body>
</html>