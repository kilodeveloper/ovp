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
  <title>Voter Panel</title> 
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
  <link rel="shortcut icon" href="images/icon.png" />
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

</form>
          <div class="row">
          
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" align-center>Ballot paper</h4>
                 <div class="form" >
                   <form method="POST">
                   <form class="forms-sample">
                   <?php	
$aid=$_SESSION['id'];
	$ret="select * from voter where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$aid);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>	
                   <div class="form-group">
                      <label for="unitCode">Full Name</label>
                      <input type="text" class="form-control"value="<?php echo $row->name;?>"  readonly>
                    </div>
    <?php }
    ?>
                 <label>Governatory:</label>
                 
                  <?php



$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "evoting";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `politician` WHERE seatvying='governor'";
$result = mysqli_query($connect, $query);

$options1= "";

while($row = mysqli_fetch_array($result))
{
  $options1a=$options1."$row[name]";
    $options1 = $options1."<option>$row[name]</option>";
}

?>

<select>
            <?php echo $options1;?>
        </select>
        <br>

        <label>Senetor:</label>
                 
                 <?php



$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "evoting";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `politician` WHERE seatvying='senetor'";
$result = mysqli_query($connect, $query);

$options2 = "";

while($row = mysqli_fetch_array($result))
{
  $options2a=$options2."$row[name]";
   $options2 = $options2."<option>$row[name]</option>";
}

?>

<select>
           <?php echo $options2;?>
       </select>
       <br>
       <label>Women Rep:</label>
                 
                 <?php



$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "evoting";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `politician` WHERE seatvying='womanrep'";
$result = mysqli_query($connect, $query);
$options3a="";
$options3= "";

while($row = mysqli_fetch_array($result))
{
  $options3a=$options3."$row[name]";
   $options3 = $options3."<option>$row[name]</option>";
}

?>

<select>
           <?php echo $options3;?>
       </select>
<br>
       <label>MCA:</label>
                 
                 <?php



$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "evoting";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `politician` WHERE seatvying='mca'";
$result = mysqli_query($connect, $query);
$options4a="";
$options4 = "";

while($row = mysqli_fetch_array($result))
{
   $options4a=$options4."$row[name]";

   $options4 = $options4."<option>$row[name]</option>";
}

?>

<select>
           <?php echo $options4;?>
       </select>
       <br>
       <input type="submit" name="vote" value="vote" class="btn btn-primary"> 
</form>

                                                                            
</div>
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
  <?php
  include('includes/config.php');
if(isset($_POST['vote']))
{
$governor=$options1a;
$senetor=$options2a;
$womanrep=$options3a;
$mca=$options4a;
$votename=$_SESSION['id'];
$query="insert into elected (governor,senetor,womanrep,mca,votename) values(?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('sssss',$governor,$senetor,$womanrep,$mca,$votename);
$stmt->execute();
echo"<script>alert(' Successfully voted');</script>";
}
?>

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
  <!-- End custom js for this page-->
</body>

</html>