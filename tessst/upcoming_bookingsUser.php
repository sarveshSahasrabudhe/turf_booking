<!-- header -->
<?php include "includes/header.php" ; ?>


<!-- navbar -->
<?php include "includes/navbar.php" ; ?>



    <!-- Sidebar -->
    <?php include "includes/sidebar.php" ; ?>
    

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Hello</a>
          </li>
          <li class="breadcrumb-item active"><?php echo $_SESSION['userName_back'];?></li>
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
            Upcoming Bookings</div>
          <div class="card-body">
            <div class="table-responsive">
            <form action="" method="POST">
            <!-- <input class="form-control" id="myInput" type="text" placeholder="Search.."> -->
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>Id</th>
                    <th>Turf Name</th>
                    <th>Turf Area</th>
                    <th>Customer Name</th>
                    <th>Customer Mobile</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                    <th>Date </th>
                    </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Turf Name</th>
                  <th>Turf Area</th>
                  <th>Customer Name</th>
                  <th>Customer Mobile</th>
                  <th>In Time</th>
                  <th>Out Time</th>
                  <th>Date </th>
                </tr>
              </tfoot>
              <tbody id="myTable">
              <?php
               $current_date = date("Y-m-d") ;
           
              $ll=$_SESSION['userName_back'];
                $query = "SELECT * FROM BookingDetails where customerName = '$ll' && id>400 && date>='$current_date'  ";
            //    $query = "SELECT * FROM TurfDetails where managerName = '$ll'";
               $query_result = mysqli_query($connection,$query);  
               if($query_result)
               {
                 $id2 =1;
                   while($row = mysqli_fetch_assoc($query_result))
                   {
                         $id = $row['id'];
                       $turfName = $row['turfName'];
                       $turfArea = $row['turfArea'];
                       $customerName = $row['customerName'];
                       $customerMobile = $row['customerMobile'];
                       $inTime = $row['inTime'];
                       $outTime = $row['outTime'];
                       $date = $row['date'];
                       
                       echo 
                       "  
                       <tr>
                       <td>$id2</td>
                        <td>$turfName</td>
                        <td>$turfArea</td>
                        <td>$customerName</td>
                        <td>$customerMobile</td>
                        <td>$inTime</td>
                        <td>$outTime</td>
                        <td>$date</td>
                        <td><a href='upcoming_bookingsUser.php?cancel_bookinguser=$id'>Cancel Booking</a></td>

                       </tr>
                   ";
                   $id2++;
                       
                   }
               }
               
               else
               {
                   echo "Error in query";
               }
               
            //    if(empty($query_result))
            //    {
            //        echo "<tr>No Upcoming Bookings</tr>";
            //    }
              
              ?>
              
           
                 </tbody> 
                 <!-- <script>
        $(document).ready(function()
        {
            $("#myInput").on("keyup", function() 
            {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() 
                {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script> -->
              
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
        if(isset($_GET['cancel_bookinguser']))
        {
            $delete_id = $_GET['cancel_bookinguser'];
            $query_delete = "DELETE FROM BookingDetails WHERE id='$delete_id'";
            $query_delete_result = mysqli_query($connection,$query_delete);
            if($query_delete_result)
            {
                echo "<script>

                    alert('Booking Cancelled!');
                
                </script>";
                header("Location:upcoming_bookingsUser.php");
            }
            else
            {
                die("Delete Query is Wrong".mysqli_error(($connection)));
            }
        }
       
    ?>
 
  
  <?php include "includes/footer.php" ; ?>

