<!-- header -->
<?php include "includes/header.php" ; ?>
<?php include "includes/navbar.php" ; ?>
<?php include "includes/sidebar.php" ; ?>
<?php 
if (!isset($_SESSION['userName_back']))
{
  header("Location:../");
}
?>



<div id="content-wrapper">


  
      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Hello</a>
          </li>
          <li class="breadcrumb-item active"><?php echo $_SESSION['userName_back'];?></li>
        </ol>
        

  



        <div class="col-md-8">

        <?php

              
               $query = "SELECT * FROM TurfDetails LIMIT 5 ";
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
                         
                         
                         <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalCenter'>
                         Select Turf
                       </button>
                       </div>
                     </div> ";
                       
                   }
               }
               else
               {
                   echo "Error in query";
               }
              
              ?>

          <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
              Select Turf
            </button> -->

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Select TURF</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   <form action="bookturf.php" method="POST">
                   <div class="modal-body"> 
                   <div class="form-control">Select Turf : 
                   <select name="turfBookName222"  id="turfBookName222" required="required" >
                      <?php

                        $query = "SELECT DISTINCT turfName FROM TurfDetails ";
                        $query_result = mysqli_query($connection,$query);

                        if($query_result)
                        {
                            while($row = mysqli_fetch_assoc($query_result))
                            {
                                $turfName = $row['turfName'];
                                echo 
                                " <option  value='$turfName'>$turfName</option>";
                              
                                
                                
                            }
                        }
                        else
                        {
                            echo "Error in query";
                        }
                  
                        ?>
                      </select>
                  
                     </div>

                  </div>
               
                 
                  <?php     
                        
                         
                        
                          echo " 
                          <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                            <button type='submit' name='submitclicked'  class='btn btn-primary '>Save changes</button>
                          </div>";

                      ?>
                              </form>
                  <!-- <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                    <button type='button' class='btn btn-primary ' href='bookturf.php?turf=$turfName' name='savechanges'>Save changes</button>
                    <a href='bookturf.php?turf=$turfName' class='btn btn-primary '>Save changes</a>
                  </div> -->
                </div>
              </div>
            </div>


    
         </div>
      </div>
      <!-- /.container-fluid -->
                
                                
     



   <!-- footer   -->
   <?php include "includes/footer.php" ; ?>
