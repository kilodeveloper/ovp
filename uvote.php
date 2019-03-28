<?php
session_start();
include('includes/config.php');
//date_default_timezone_set('Asia/Kolkata');
include('includes/checklogin.php');
check_login();
$aid=$_SESSION['id'];?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>voter Portal</title> 
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
 <!-- <link rel="shortcut icon" href="images/icon.png" />-->
</head>

<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->

   
   
          <?php include("includes/header.php")?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include("includes/navbar.php")?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
     
          <div class="column">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <?php	
$aid=$_SESSION['id'];
	$ret="select * from elected where votename=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$aid);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>	
                  <h4 class="card-title"><?php echo $row->votename;?>'s&nbsp;Your votes overview</h4>
              <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="unitCode">Governor</label>
                      <input type="text" class="form-control"value="<?php echo $row->governor;?>"  readonly>
                    </div>

                    <div class="form-group">
                      <label for="unitName">Senetor</label>
                      <input type="email" class="form-control" value="<?php echo $row->senetor;?>"  readonly>
                    </div>

                    <div class="form-group">
                      <label for="studyMode">Women Rep</label>
                      <input type="text" class="form-control" value="<?php echo $row->womanrep;?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="studyMode">MCA</label>
                      <input type="text" class="form-control" value="<?php echo $row->mca;?>" readonly>
                    </div>
             <p>Time of vote:<?php echo $row->votetime;?></p>
                
                
                  </form>
                </div>
              </div>
            </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            
                
              </div>
              <!--weather card ends-->
            </div>
           
          </div>
         
          
        </div>
        <!-- content-wrapper ends -->
        <?php include("includes/footer.php")?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>
    <?php }?>

</html>