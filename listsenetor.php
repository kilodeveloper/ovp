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
    <!-- partial:../../partials/_navbar.html -->
    <?php include("includes/header.php")?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php include("includes/navbar.php")?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            

            
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">List of contestants</h4>
                  
                 
                      <?php	
$aid=$_SESSION['id'];
$ret="select* from politician where seatvying='senetor'";
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
			
				<li>
				
						<img class="thumb" src="images/<?php echo  $row-> img ?>" width="300" height="200">
					</a>
		<span class="price"><?php  echo $row-> name ?></span>
					
						
					
					</div>
				</li>
			<?php
				}
			?>
			</ul>
		</div>
	</section>	<!--  end listing section  -->
<!--
<td>
<a href="javascript:void(0);"  onClick="popUpWindow('http://localhost/hostel/admin/full-profile.php?id=<?php echo $row->id;?>');" title="View Full Details"><i class="fa fa-desktop"></i></a>&nbsp;&nbsp;
<a href="manage-students.php?del=<?php echo $row->id;?>" title="Delete Record" onclick="return confirm("Do you want to delete");"><i class="fa fa-close"></i></a></td>
										</tr> -->
								
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
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
  <script src="vendors/js/vendor.bundle.addons.js"></scrMCA'ipt>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>