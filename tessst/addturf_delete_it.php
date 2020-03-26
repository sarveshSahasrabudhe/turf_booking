<!-- header -->
<?php include "includes/header.php" ; ?>


<!-- navbar -->
<?php include "includes/navbar.php" ; ?>



    <!-- Sidebar -->
    <?php include "includes/sidebar.php" ; ?>

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
          <li class="breadcrumb-item active">Add Turf</li>
        </ol>

        <!-- Page Content -->
        <h1>Turf Details</h1>
        <hr>
        <form method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="turfName" class="form-control" name="turfName" placeholder="Turf name" required="required" autofocus="autofocus">
                  <label for="turfName">Turf Name</label>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="turfLocation" class="form-control" name="turfLocation" required="required" placeholder="Turf location" >
                  <label for="turfLocation">Turf Area</label>
                </div>
              </div>
            </div>
            
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="managerName" class="form-control" name="managerName" placeholder="Manager Name" required="required" autofocus="autofocus" >
                  <label for="managerName">Manager Name</label>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="managerMobile" class="form-control" name="managerMobile" required="required" placeholder="Mobile" >
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
                <select name="turfs"  id="noOfTurf" required="required" >
                <option name="turfs" value="1">1</option>
                <option name="turfs" value="2">2</option>
                <option name="turfs" value="3">3</option>
                <option name="turfs" value="4">4</option>
                </select>
              </div>
                
                  <!-- <label for="">Manager Name</label> -->
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="file" id="image" class="form-control" required="required" name="turfImages" placeholder="Images"  multiple>
                  <label for="image">Ground Images</label>
                  
                </div>
              </div>
            </div>
            
           </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4 form-check">
                <div class="form-label-group form-control"> Food Court Available :
                  <input type="checkbox" id="food"   name="food"  autofocus="autofocus" >
              
                  
                 
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="form-label-group">
                <input type="time" id="openTime" class="form-control" name="openTime" required="required"  >
                  <label for="openTime">Opening Time</label>
         
                    
                  </div>
                </div>

             <div class="col-md-4">
                <div class="form-label-group">
                <input type="time" id="closeTime" class="form-control" name="closeTime" required="required"  >
                  <label for="closeTime">Closing Time</label>
         
                    
                  </div>
                </div>
              </div>
            </div>

          


          <input type="submit" value="Register Turf" class="btn btn-primary btn-block" name="click">
        </form>

      </div>
   

      </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



     <!-- Sticky Footer  php link-->
     <?php include "includes/footer.php" ; ?>

      <?php 
      
      if(isset($_POST['click']))
      {
         // echo "Button clicked";
          $turfName = $_POST['turfName'];
      
          $turfLocation = $_POST['turfLocation'];
      
          $managerName = $_POST['managerName']; 
         
          $managerMobile = $_POST['managerMobile'];
      
          $turfs = $_POST['turfs'];
          // $post_image = $_FILES['image']['name'];
          // $post_image_temp = $_FILES['image']['tmp_name'];

      
          // move_uploaded_file($post_image_temp, "../images/$post_image" );
        
         // $turfImages = escape($_FILES['turfImages']['.jpeg,.png,.jpg']);

          //  $turfImages_temp = escape($_FILES['turfImages_temp']['.jpeg,.png,.jpg']);
      
          // $foods = $_POST['food'];
          if($_POST['food'])
          {
             $foodie = 'Yes';
          }
          elseif(empty($foods))
          {
            $foodie = 'No';
          }
      
            $openTime = $_POST['openTime'];

            $closeTime = $_POST['closeTime'];

         


          $display_query="SELECT * from TurfDetails
                          where (turfName='$turfName' && turfArea='$turfLocation' && managerName='$managerName')";

            $result=mysqli_query($connection,$display_query);

            $rowcount=mysqli_num_rows($result);
            if($rowcount>0)  
            {
            echo "<script>
                alert('Turf already exists ')
                window.open('addturf.php');
            </script>";
            }
            else
            {
                
            
                $query = "INSERT INTO TurfDetails(turfName,turfArea,managerName,managerMobile,totalGrounds,openingTime,closingTime,foodCourt) 
                          VALUES('$turfName','$turfLocation','$managerName','$managerMobile','$turfs','$openTime','$closeTime','$foodie')";

                $result = mysqli_query($connection,$query);

                if($result)
                {
                  echo "Adding successs in turf table";
                }

                else 
                {
                    echo "Adding Error in turf table";
                }
              
             
              }
         }
      
      ?>
