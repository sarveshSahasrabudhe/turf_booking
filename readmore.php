<?php include "includes/web_header.php"?>


  <!-- Navigation -->
  <?php include "includes/web_navbar.php"?>
 
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">
          <small></small>
        </h1>

        <!-- Blog Post -->
        <!-- <div class="card mb-4">
          <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title">Post Title</h2>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
            <a href="#" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on January 1, 2017 by
            <a href="#">Start Bootstrap</a>
          </div>
        </div> -->



        <?php
            if(isset($_GET['read']))
            {   
                $read = $_GET['read'];
                // $popular_query = "SELECT turfName, COUNT(turfName) FROM BookingDetails GROUP BY turfName HAVING COUNT(turfName) > 25 ";
                // $popular_query_result = mysqli_query($connection,$popular_query);
                // if($popular_query_result)
                // {
                //     while($row_popular = mysqli_fetch_assoc($popular_query_result))
                //     {
                //         $turfName1 = $row_popular['turfName'];
                //         $turfArea1 = $row_popular['turfArea'];
                //     }
                // }
                
                $query = "SELECT * FROM TurfDetails where id = '$read'";
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
                        $turfImages1 = $row['turfImages1'];
                        $turfImages2 = $row['turfImages2'];
                        $analysis = $row['analysis'];
                        $managerMobile = $row['managerMobile'];
                        echo 
                        " <div class='card mb-4'>
                      
 
 
                         <div id='carouselExampleFade' class='carousel slide carousel-fade' data-ride='carouse'>
                         <div class='carousel-inner'>
                           <div class='carousel-item active'>
                             <img src='images/$turfImages1' height='300px'  class='d-block w-100' alt='...'>
                           </div>
                           <div class='carousel-item'>
                             <img src='images/$turfImages2' height='300px'  class='d-block w-100' alt=''...'>
                           </div>
                           <div class='carousel-item'>
                             <img src='images/$turfImages1' height='300px'  class='d-block w-100' alt='...'>
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

                          <img src='analysis/$analysis' class='img-fluid' alt='Responsive image'>
 
                          <a href='index.php' class='btn btn-primary'>Read Less &larr;</a>
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
              
              
              ?>

       




        <!-- Pagination -->
        <!-- <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul> -->

      </div>

      <!-- Sidebar Widgets Column -->
      <?php include "includes/web_sidebar.php"?>
  

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include "includes/web_footer.php"?>