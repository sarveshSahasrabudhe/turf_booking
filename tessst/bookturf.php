<!-- header -->
<?php include "includes/header.php" ; ?>
<?php include "includes/navbar.php" ; ?>
<?php include "includes/sidebar.php" ; ?>

<?php 
// if (!isset($_SESSION['managerName_back']))
// {
//   header("Location:../");
// }
?>

<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Book Turf</li>
        </ol>

        <form method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">

                      <?php
                        
                      if(isset($_POST['submitclicked']))
                        {
                          $turfBookName_select = $_POST['turfBookName222'];
                           $usr = $_SESSION['userName_back'];
                          // echo "<script>alert(' $turfBookName');</script>";
                          $query_select = "SELECT DISTINCT turfName FROM TurfDetails WHERE turfName='$turfBookName_select'";
                          $query_select_result = mysqli_query($connection,$query_select);
                          if($query_select_result)
                          {
                              while($row=mysqli_fetch_assoc($query_select_result))
                              {
                                   $turf_name = $row['turfName'];
                                   //$customerName = $row['customerName'];
                                  echo "
                                  <input type='text' name='turfname' id='turf_name' class='form-control ' readonly='readonly' value='$turfBookName_select'><br>
                                  ";
                              }
                              // disable not working in input type above
                             
                          }
                         
                          }
                          

                        
                      ?>
                </div>
                
              </div>

              <div class="col-md-6">
                <div class="form-label-group">
                  <div class="form-control">Select Turf Area : 
                    <select name="turfbookarea"  id="turfbookarea" required="required" >
                        <?php
                           $turf_select_forarea = $_POST['turfBookName222'];
                          $query = "SELECT * FROM TurfDetails where turfName='$turf_select_forarea' ";
                          $query_result = mysqli_query($connection,$query);

                          if($query_result)
                          {
                              while($row = mysqli_fetch_assoc($query_result))
                              {
                                  $turfArea = $row['turfArea'];
                                  echo 
                                  " <option  value='$turfArea'>$turfArea</option>";
                                
                                  
                                  
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
            </div>
            
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group"> 
                <?php 
                   echo "
                   <input type='text' id='customerName' class='form-control' name='customerName' value= '$usr' readonly='readonly' required='required' autofocus='autofocus' >
                   ";
                ?>
               
                 
                  <label for="customerName">Customer Name</label>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="customerMobile" class="form-control" name="customerMobile" required="required" placeholder="Mobile" >
                  <label for="customerMobile">Mobile</label>
                </div>
              </div>
            </div>
            
          </div>

          <div class="form-group">
            <div class="form-row">
              
              
              <div class="col-md-4 ">
                <div class="form-label-group">
                <input type="time" id="inTime" class="form-control" name="inTime" required="required"  >
                  <label for="inTime">In Time</label>
         
                    
                  </div>
                </div>

             <div class="col-md-4">
                <div class="form-label-group">
                <input type="time" id="outTime" class="form-control" name="outTime" required="required"  >
                  <label for="outTime">Out Time</label>
         
                    
                  </div>
                </div>
                <div class="col-md-4 ">
                <div class="form-label-group">
                <input type="date" id="bookingdate" class="form-control" name="bookingdate" required="required"  >
                  <label for="inTime">Date</label>
         
                    
                  </div>
                </div>
              </div>
            </div>

     

          <input type="submit" value="Confirm Booking" class="btn btn-primary btn-block" name="book">
        </form>


   

      </div>
      <!-- /.container-fluid -->

     


       <?php

       if(isset($_POST['book']))
      {
          
         //echo "Button clicked";
          $turfBookName = $_POST['turfname'];
      
          $turfArea = $_POST['turfbookarea'];
      
            $customerName = $_POST['customerName']; 
         
            $customerMobile = $_POST['customerMobile'];
      
             $inTime = $_POST['inTime'];

          $outTime = $_POST['outTime'];

          $bookingdate = $_POST['bookingdate'];
      
           $book = $_POST['book'];
      
       

          // if($foods)
          // {
          //   $foodie = 'Yes';
          // }
          // else
          // {
          //   $foodie = 'No';
          // }



          // $totalTurf;
          // $highest = 0;

          // $display_query_count="SELECT * from BookingDetails
          //      where (turfName='$turfBookName' AND  turfArea='$turfArea' AND  date = '$bookingdate' AND
          //                ((inTime between '$inTime' and '$outTime') OR (outTim' between '$inTime' and '$outTime'))";

          //   $result_count=mysqli_query($connection,$display_query_count);
          //   //$rowcount_count=mysqli_num_rows($result_count);

          //   $clash = "SELECT * FROM TurfDetails where turfName='$turfBookName' &&  turfArea='$turfArea'";
          //   $clash_result=mysqli_query($connection,$clash);
            

          //   while($clash_row = mysqli_fetch_assoc($clash_result))
          //   {
          //     $totalTurf = $clash_row['totalGrounds'];
          //   }


          
          //   while($row_count = mysqli_fetch_assoc($result_count))
          //   {
          //     $count = $row_count['count'];
               
              
          //     if($highest<=$count)
          //     {
          //       $highest = $count;
          //     }
          //   }
          //   $inc = $highest +1;
          //   //  $update_count = "UPDATE BookingDetails SET count = '$inc' where (turfName='$turfBookName' AND  turfArea='$turfArea' AND  date = '$bookingdate' AND
          //   //  (('$inTime' between inTime and outTime) OR ('$outTime' between inTime and outTime))";
          //   //  $update_count_result = mysqli_query($connection,$update_count);
          //   if($highest>$totalTurf)
          //   {
          //     echo "<script>
          //       alert('Booking limit exceded exists choose another time slot ')
                
                
          //   </script> ";
          //   }


          $display_query="SELECT * from BookingDetails
              where (turfName='$turfBookName' AND  turfArea='$turfArea' AND  date = '$bookingdate' AND inTime = '$inTime')";
          
            $result=mysqli_query($connection,$display_query);

            $rowcount=mysqli_num_rows($result);
            if($rowcount>0)  
            {
            echo "<script>
                alert('Booking already exists choose another time slot ')
                
            </script> ";
             header("Location:book.php");
            }
            else
            {

            
                $query = "INSERT INTO BookingDetails(turfName,turfArea,customerName,customerMobile,inTime,outTime,date) 
                VALUES('$turfBookName','$turfArea','$customerName','$customerMobile','$inTime','$outTime','$bookingdate')";

                $result = mysqli_query($connection,$query);

              //   $update_count = "UPDATE BookingDetails SET count = '$inc' 
              //   where (turfName='$turfBookName' AND  turfArea='$turfArea' AND  date = '$bookingdate' AND
              //   ((inTime between '$inTime' and '$outTime') OR (outTim' between '$inTime' and '$outTime'))";

              //   $update_count_result = mysqli_query($connection,$update_count);
              //   if($update_count_result)

              //   {
              //     echo "<script>
              //     alert('yooooooooo')
                  
              // </script>";
                //}
                if($result)
                {
            //       echo "<script>
            //     alert('Booking sucess ')
                
            // </script>";
             header("Location:book.php");
                }

                else 
                {
                    echo "Adding Error in booking table";
                }
              
             }

        }
      
      ?>

<!-- SELECT ResourceID
  FROM Bookings
 WHERE DATE(StartDateTime) = '2017-07-15'
   AND Status IS NULL
   AND (    (   TIME('11:00:00') >= TIME(StartDateTime)
             OR TIME('11:00:00') <= TIME(EndDateTime)
            )
        AND (   TIME('12:00:00') >= TIME(StartDateTime)
             OR TIME('12:00:00') <= TIME(EndDateTime)
            )
       ) -->


       <!-- https://dba.stackexchange.com/questions/179889/comparing-two-time-fields-in-database-with-2-given-time-fields -->


   <!-- footer   -->
   <?php include "includes/footer.php" ; ?>
