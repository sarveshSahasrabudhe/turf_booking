<div class="col-md-4">

<!-- Search Widget -->
<div class="card my-4">
  <h5 class="card-header">Search</h5>
  <div class="card-body">
  <form action="web_search.php" method="POST" class="col-lg-8">
    <div class="input-group">
    
      <input type="text" name="web_searchText" class="form-control" placeholder="Search for...">
     <div class="input-group-append">
      <input type="submit" class="btn btn-secondary" name="submit"  value="Go!">
     </div>
       
        
        
  
     </form>
    </div>
  </div>
</div>


<!-- Categories Widget -->
<div class="card my-4">
  <h5 class="card-header">Popular Turfs</h5>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-12">
        <ul class="list-unstyled mb-0">
         

          <?php
               $query = "SELECT * FROM TurfDetails LIMIT 6 ";
               $query_result = mysqli_query($connection,$query);

               if($query_result)
               {
                   while($row = mysqli_fetch_assoc($query_result))
                   {
                       $id = $row['id'];
                       $turfName = $row['turfName'];
                       $turfArea = $row['turfArea'];
                      //  $totalGrounds = $row['totalGrounds'];
                      //  $openingTime = $row['openingTime'];
                      //  $closingTime = $row['closingTime'];
                      //  $foodCourt = $row['foodCourt'];
                      //  $turfImages = $row['turfImages'];
                       echo 
                       "<li>
                       <a href='readmore.php?read=$id' > $turfName,<small>$turfArea</small></a>
                     </li>";
                       
                   }
               }
               else
               {
                   echo "Error in query";
               }
              
              ?>
          <!-- <li>
            <a href="#">Freebies</a>
          </li> -->
        </ul>
      </div>
      <!-- <div class="col-lg-6">
        <ul class="list-unstyled mb-0">
          <li>
            <a href="#">JavaScript</a>
          </li>
          <li>
            <a href="#">CSS</a>
          </li>
          <li>
            <a href="#">Tutorials</a>
          </li>
        </ul>
      </div> -->
    </div>
  </div>
</div>

<!-- Side Widget -->
<!-- <div class="card my-4">
  <h5 class="card-header">Side Widget</h5>
  <div class="card-body">
    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
  </div>
</div> -->

</div>