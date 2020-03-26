<!-- header -->
<?php include "manager_includes/manager_header.php" ; ?>


<!-- navbar -->
<?php include "manager_includes/manager_navbar.php" ; ?>
<?php
  if(isset($_GET['source']))
  {
   
    
    $_SESSION['managerName_back'] = null;
    $_SESSION['managerEmail_back'] = null;
    $_SESSION['managerMobile_back'] =null;
    $_SESSION['userDOB_back'] = null;
    $_SESSION['managerPassword_back'] = null;
    $_SESSION['usermanager_id_id'] = null;
    $_SESSION['managerPassword_back'] =null;



    // $_SESSION['userName_back'] = null;
    // $_SESSION['userEmail_back'] = null;
    // $_SESSION['userMobile_back'] = null;
    // $_SESSION['userDOB_back'] = null;
    // $_SESSION['userPassword_back'] = null;
    // $_SESSION['user_id'] = null;
    // $_SESSION['userDOB_back'] = null;
      header("Location: ../../");

  }
?>


    <!-- Sidebar -->
    <?php include "manager_includes/manager_sidebar.php" ; ?>
    

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Hello</a>
          </li>
          <li class="breadcrumb-item active"><?php echo $_SESSION['managerName_back'];?></li>
        </ol>
        <?php
       $name =  $_SESSION['managerName_back'] ;
       $current_date = date("Y-m-d") ;
         $query = "SELECT * FROM BookingDetails where turfName in (SELECT turfName FROM TurfDetails where managerName = '$name') && date>='$current_date' ";
         //    $query = "SELECT * FROM TurfDetails where managerName = '$ll'";
            $query_result = mysqli_query($connection,$query);

            if($query_result)
            {
              $rowcount = mysqli_num_rows($query_result);
            }
          $totalt = "SELECT * FROM TurfDetails where managerName = '$name'";
          $totalt_result = mysqli_query($connection,$totalt);
            if($totalt_result)
            {
              $rowcount_turf = mysqli_num_rows($totalt_result);
            }
            $query_book = "SELECT * FROM BookingDetails where turfName in (SELECT turfName FROM TurfDetails where managerName = '$name')  ";
              $querybook_result = mysqli_query($connection,$query_book);
   
               if($querybook_result)
               {
                 $rowcount_bookings = mysqli_num_rows($querybook_result);
               }
       

        ?>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5"><?php echo $rowcount; ?> New Bookings</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="upcoming_bookings.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5"><?php echo $rowcount_turf?> Owned Turfs!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5"><?php echo $rowcount_bookings?> Total Bookings!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="view_bookings.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <!-- <div class="col-xl-3 col-sm-6 mb-3">
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
          </div> -->
        </div>

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
            Your Turfs</div>
          <div class="card-body">
            <div class="table-responsive">
            <form action="index.php" method="POST">
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
              $ll=$_SESSION['managerName_back'];
               $query = "SELECT * FROM TurfDetails where managerName = '$ll' ";
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
                        <td><a href='edit.php?edit=$id'>Edit</a></td>
                        <td><a href='index.php?delete=$id'>Delete</a></td>
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
             </form>
            
              
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

  <?php
        if(isset($_GET['delete']))
        {
            $delete_id = $_GET['delete'];
            $query_delete = "DELETE FROM TurfDetails WHERE id='$delete_id'";
            $query_delete_result = mysqli_query($connection,$query_delete);
            if($query_delete_result)
            {
                echo "<script>

                    alert('Category deleted!');
                
                </script>";
                header("Location:index.php");
            }
            else
            {
                die("Delete Query is Wrong".mysqli_error(($connection)));
            }
        }
       
    ?>
  
  <?php include "manager_includes/manager_footer.php" ; ?>

