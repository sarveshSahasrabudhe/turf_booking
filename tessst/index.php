<!-- header -->
<?php include "includes/header.php" ; ?>


<!-- navbar -->
<?php include "includes/navbar.php" ; ?>
<?php 
if (!isset($_SESSION['managerName_back']))
{
  header("Location:../");
}
?>



    <!-- Sidebar -->
    <?php include "includes/sidebar.php" ; ?>
    <?php
  if(isset($_GET['source']))
  {
   
    
    // $_SESSION['managerName_back'] = null;
    // $_SESSION['managerEmail_back'] = null;
    // $_SESSION['managerMobile_back'] =null;
    // $_SESSION['userDOB_back'] = null;
    // $_SESSION['managerPassword_back'] = null;
    // $_SESSION['usermanager_id_id'] = null;
    // $_SESSION['managerPassword_back'] =null;



    $_SESSION['userName_back'] = null;
    $_SESSION['userEmail_back'] = null;
    $_SESSION['userMobile_back'] = null;
    $_SESSION['userDOB_back'] = null;
    $_SESSION['userPassword_back'] = null;
    $_SESSION['user_id'] = null;
    $_SESSION['userDOB_back'] = null;
      header("Location: ../");

  }
?>
    

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <!-- <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">26 New Messages!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">11 New Tasks!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">123 New Orders!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">13 New Tickets!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div> -->

        <!-- Area Chart Example-->
        <!-- <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Area Chart Example</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div> -->

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            All Turfs</div>
          <div class="card-body">
            <div class="table-responsive">
             <table class="table table-bordered" id="turfs" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Turf name</th>
                  <th>Turf Area</th>
                  <th>Total Grounds</th>
                  <th>Opening Time</th>
                  <th>Closing Time</th>
                  <th>Food Court</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Turf name</th>
                  <th>Turf Area</th>
                  <th>Total Grounds</th>
                  <th>Opening Time</th>
                  <th>Closing Time</th>
                  <th>Food Court</th>
                </tr>
              </tfoot>
              <?php
               $query = "SELECT id,turfName,turfArea,totalGrounds,openingTime,closingTime,foodCourt FROM TurfDetails  ";
               $query_result = mysqli_query($connection,$query);

               if($query_result)
               {
                   while($row = mysqli_fetch_assoc($query_result))
                   {
                       $id = $row['id'];
                       $turfName = $row['turfName'];
                       $turfArea = $row['turfArea'];
                       $totalGrounds = $row['totalGrounds'];
                       $openingTime = $row['openingTime'];
                       $closingTime = $row['closingTime'];
                       $foodCourt = $row['foodCourt'];
                       echo 
                       "  <tbody>
                       <tr>
                        <td>$turfName</td>
                        <td>$turfArea</td>
                        <td>$totalGrounds</td>
                        <td>$openingTime</td>
                        <td>$closingTime</td>
                        <td>$foodCourt</td>

                       </tr>
                   </tbody>";
                       
                   }
               }
               else
               {
                   echo "Error in query";
               }
              
              ?>
           
              
              
             </table>
              
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>






  <!-- footer   -->
  <?php include "includes/footer.php" ; ?>

