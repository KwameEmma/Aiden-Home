<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php  include('connect.php');?>


  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">About Author</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">About Author</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
               
                <!-- /# row -->
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                              <b>Name :</b> Nii Armar Jnr.
                              <br><br>
                              <b>Experty in</b> : PHP, Codeignitor, Laravel.
                              <br><br>
                              <b>work Exprience</b> : Over 6 Years and above.
                              <br><br>
                             
                              <b>Mobile Number :</b> <a href="#">0559548500</a>
                              <br><br>
                              <b>WhatsApp Number :</b> <a href="#">0279663350</a>
                              <br><br>
                              <b>Email Address :</b> <a href="https://www.gmail.com">braniiblack@gmail.com</a>
                              <br><br>
                              <font size="2" color="red">Please contact me when you need a software, I develop all forms of softwares from standalone, to mobile and web applications</b></font>
                            </div>
                            <div class="card-body">
                              
                            </div>
                        </div>  <br><br><br><br><br><br><br>  <br><br><br>
                    </div>
                  
                </div>
                
               
                <!-- /# row -->

                <!-- End PAge Content -->
           

<?php include('footer.php');?>

<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success"  data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>

    <script type="text/javascript">
    function refresh_cls() {
      
                  setTimeout(function(){// wait for 5 secs(2)
                  location.reload(); // then reload the page.(3)
             }, 1000);
      }  
    </script>