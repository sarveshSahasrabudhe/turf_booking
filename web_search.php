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

        <?php
        if(isset($_POST['submit']))
        {  
          //  echo "clickeeeeeddd";
            $searchText = $_POST['web_searchText'];
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

                         <a href='readmore.php?read=$id' class='btn btn-primary'>Read More &rarr;</a>
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

            <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>

      </div>

      <!-- Sidebar Widgets Column -->
      <?php include "includes/web_sidebar.php"?>
  

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include "includes/web_footer.php"?>






















  




           
