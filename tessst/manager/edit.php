<!-- header -->
<?php include "manager_includes/manager_header.php" ; ?>


<!-- navbar -->
<?php include "manager_includes/manager_navbar.php" ; ?>



    <!-- Sidebar -->
    <?php include "manager_includes/manager_sidebar.php" ; ?>

    <?php 
    $connection = mysqli_connect('localhost', 'root','','i2it');

    // if($connection)
    //     {
    //         echo "Connection sucessful";
    //     }
    // else
    //     {
    //         echo "Connection Error";
    //     }
    
    ?>


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Edit Turf</li>
        </ol>

        <!-- Page Content -->
        <h1>Turf Details</h1>
        <hr>

        <form method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                <?php 
           if(isset($_GET['edit']))
           {
            $edit_id = $_GET['edit'];
            $query_edit = "SELECT * FROM TurfDetails WHERE id='$edit_id'";
            $query_edit_result = mysqli_query($connection,$query_edit);
            if($query_edit_result)
            {
                while($row=mysqli_fetch_assoc($query_edit_result))
                {
                    $edit_turfName = $row['turfName'];
                    $edit_turfArea = $row['turfArea'];
                    $edit_managerName = $row['managerName'];
                    $edit_managerMobile = $row['managerMobile'];
                    $edit_totalGrounds = $row['totalGrounds'];
                    $edit_openingTime = $row['openingTime'];
                    $edit_closingTime = $row['closingTime'];
                    $edit_foodCourt = $row['foodCourt'];
                    echo "
                    <input type='text' id='category' class='form-control' name='updatedtitle' value='$edit_turfName' required='required' autofocus='autofocus'>
                    ";
                } 
                //header("Location:edit.php");
            }   

           }
        ?>
                  <!-- <input type="text" id="turfName" class="form-control" name="turfName" placeholder="Turf name" required="required" autofocus="autofocus"> -->
                  <label for="turfName">Turf Name</label>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-label-group">
                  <?php
                  echo "
                  <input type='text' id='turfLocation' class='form-control' value='$edit_turfArea' name='updatedLocation' required='required'>
                  ";
                   
                  ?>
                  
                  <label for="turfLocation">Turf Area</label>
                </div>
              </div>
            </div>
            
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                <?php
                  echo "
                  <input type='text' id='managerName' class='form-control' value='$edit_managerName' readonly='readonly' name='updatedManager' required='required'>
                  ";
                   
                  ?>
                  <!-- <input type="text" id="managerName" class="form-control" name="managerName" placeholder="Manager Name" required="required" autofocus="autofocus" > -->
                  <label for="managerName">Manager Name</label>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-label-group">
                <?php
                  echo "
                  <input type='number' id='managerMobile' class='form-control' value='$edit_managerMobile'  name='updatedManagerMobile' required='required'>
                  ";
                   
                  ?>
                  <!-- <input type="number" id="managerMobile" class="form-control" name="managerMobile" required="required" placeholder="Mobile" > -->
                  <label for="managerMobile">Mobile</label>
                </div>
              </div>
            </div>
            
          </div>



          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                <div class="form-control">Select Number Of Grounds : 
                <select name="updatedTurfs"  id="noOfTurf" required="required" >
                <option name="updatedTurfs" value="1">1</option>
                <option name="updatedTurfs" value="2">2</option>
                <option name="updatedTurfs" value="3">3</option>
                <option name="updatedTurfs" value="4">4</option>
                </select>
              </div>
                
                  <!-- <label for="">Manager Name</label> -->
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-label-group">
                <?php
                  // echo "
                  // <input type='file' id='image' class='form-control' value='$edit_turfArea' name='updatedLocation' required='required'>
                  // ";
                   
                  ?>
                  <input type="file" id="image" class="form-control" required="required" name="updateImage" placeholder="Images"  multiple>
                  <label for="image">Ground Images</label>
                  
                </div>
              </div>
            </div>
            
           </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4 form-check">
                <div class="form-label-group form-control"> Food Court Available :
                  <input type="checkbox" id="food"   name="updateFood"  autofocus="autofocus" >
              
                  
                 
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="form-label-group">
                <?php
                  echo "
                  <input type='time' id='openTime' class='form-control' value='$edit_openingTime' name='updatedOpenTime' required='required'>
                  ";
                   
                  ?>
                <!-- <input type="time" id="openTime" class="form-control" name="openTime" required="required"  > -->
                  <label for="openTime">Opening Time</label>
         
                    
                  </div>
                </div>

             <div class="col-md-4">
                <div class="form-label-group">
                <?php
                  echo "
                  <input type='time' id='closeTime' class='form-control' value='$edit_closingTime' name='updatedClosTime' required='required'>
                  ";
                   
                  ?>
                <!-- <input type="time" id="closeTime" class="form-control" name="closeTime" required="required"  > -->
                  <label for="closeTime">Closing Time</label>
         
                    
                  </div>
                </div>
              </div>
            </div>




            <!-- sasaas -->

          


          <input type="submit" value="Update Turf" class="btn btn-primary btn-block" name="update_turf">
        </form>

      </div>
      <!-- /.container-fluid -->
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



     <!-- Sticky Footer  php link-->
     <?php include "manager_includes/manager_footer.php" ; ?>

      <?php 
      
      if(isset($_POST['update_turf']))
      {
         // echo "Button clicked";
          $turfName = $_POST['updatedtitle'];
      
          $turfLocation = $_POST['updatedLocation'];
      
          $managerName = $_POST['updatedManager']; 
         
          $managerMobile = $_POST['updatedManagerMobile'];
      
          $turfs = $_POST['updatedTurfs'];
      
          $image = $_POST['updateImage'];
      
          $foods = $_POST['updateFood'];
      
          $openTime = $_POST['updatedOpenTime'];

          $closeTime = $_POST['updatedClosTime'];

          if($foods)
          {
            $foodie = 'Yes';
          }
          else
          {
            $foodie = 'No';
          }

              $edit_id = $_GET['edit'];
              $query_edit = "UPDATE  TurfDetails SET turfName = '$turfName' ,turfArea = '$turfLocation' ,managerName = '$managerName' ,managerMobile = '$managerMobile' ,
                             totalGrounds = '$turfs' ,openingTime = '$openTime' ,closingTime = '$closeTime' ,foodCourt = '$foodie'WHERE id='$edit_id'";
              $query_edit_result = mysqli_query($connection,$query_edit);
              if($query_edit_result)
              {
                  header("Location:index.php");
      
              }
              else
              {
                  // echo "<script>alert('Error in query')</script>";
              }
              
             
        }
      
         
      
      ?>
