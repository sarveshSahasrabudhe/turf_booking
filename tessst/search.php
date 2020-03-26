           
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
             <!-- <table class="table table-bordered" id="turfs" width="100%" cellspacing="0">
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
              </tfoot> -->
             
              
            <?php
                   
       
        if(isset($_POST['submit']))
        {  
          //  echo "clickeeeeeddd";
            $searchText = $_POST['searchText'];
            $search_query = "SELECT * FROM TurfDetails where turfName LIKE '%$searchText%' || turfArea LIKE '%$searchText%' ";
            $result_search = mysqli_query($connection,$search_query);
        
            if($result_search)
            {
                $count = mysqli_num_rows($result_search);
                if($count==0)
                {
                    echo "No result found";
                }
                else
                {
              

               if($result_search)
               {
                   while($row = mysqli_fetch_assoc($result_search))
                   {
                       $id = $row['id'];
                       $turfName = $row['turfName'];
                       $turfArea = $row['turfArea'];
                       $totalGrounds = $row['totalGrounds'];
                       $openingTime = $row['openingTime'];
                       $closingTime = $row['closingTime'];
                       $foodCourt = $row['foodCourt'];
                       $turfImages1 = $row['turfImages1'];
                       $turfImages2 = $row['turfImages2'];
                       $analysis = $row['analysis'];
                       $managerMobile = $row['managerMobile'];
                       echo 
                       " <div class='card mb-4'>
                     


                        <div id='carouselExampleFade' class='carousel slide carousel-fade' data-ride='carouse'>
                        <div class='carousel-inner'>
                          <div class='carousel-item active'>
                            <img src='../images/$turfImages1' height='300px'  class='d-block w-100' alt='...'>
                          </div>
                          <div class='carousel-item'>
                            <img src='../images/$turfImages2' height='300px'  class='d-block w-100' alt=''...'>
                          </div>
                          <div class='carousel-item'>
                            <img src='../images/$turfImages1' height='300px'  class='d-block w-100' alt='...'>
                          </div>
                        </div>
                        <a class='carousel-control-prev' href='#carouselExampleFade' role='button' data-slide='prev'>
                          <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                          <span class='sr-only'>Previous</span>
                        </a>
                        <a class='carousel-control-next' href='#carouselExampleFade' role='button' data-slide='next'>
                          <span class='carousel-control-next-icon' aria-hidden='true'></span>
                          <span class='sr-only'>Next</span>
                        </a>
                      </div>
                       <div class='card-body'>
                         <h2 class='card-title'>$turfName  <small>,$turfArea</small></h2>
                         <p class='card-text'>Turf Timing-$openingTime to $closingTime </p>
                         <p class='card-text'>Contact Number-:$managerMobile  </p>
                        
                         <a href='read.php?readbook=$id' class='btn btn-primary'>Read More &rarr;</a>
                       </div>
                       <div class='card-footer text-muted'>
                         
                         <a href='tessst/userLogin.php'>Book Now</a>
                       </div>
                     </div> ";
                       
                   }
               }
               else
               {
                   echo "Error in query";
               }
              }
            }
          }
              
              ?>


              
             <!-- </table> -->
              
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




           
