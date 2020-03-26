<?php  include"includes/web_header.php" ?>


  <div id="wrapper">

    <!-- Sidebar -->

    <div id="content-wrapper">

      <div class="container-fluid">

<form method="post">
<input type="submit" value="subbbb" name="go" placeholder="go">
</form>
<?php
$python='/usr/bin/python3';
$pyscript1='test.py';

    if(isset($_POST['go']))
    {
		$cmd=`$python test.py`;
		echo $cmd;
		
	}
    
?><!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php  include"includes/web_footer.php" ?>

<!-- 

      $totalTurf;
          $highest = 0;

          $display_query="SELECT * from BookingDetails
               where (turfName='$turfBookName' &&  turfArea='$turfArea'  &&  date = '$bookingdate')";

            $result=mysqli_query($connection,$display_query);
            $rowcount=mysqli_num_rows($result);

            $clash = "SELECT * FROM TurfDetails where turfName='$turfBookName' &&  turfArea='$turfArea'";
            $clash_result=mysqli_query($connection,$clash);
            

            while($clash_row = mysqli_fetch_assoc($clash_result))
            {
             echo $totalTurf = $clash_row['totalGrounds'];
            }


          
            while($row = mysqli_fetch_assoc($result))
            {
             echo $count = $row['count'];
               
              
              if($highest<=$count)
              {
                $highest = $count;
              }
            }
          echo  $inc = $highest +1;
            $update_count = "UPDATE BookingDetails SET count = '$inc' ";
            if($highest>$totalTurf)
            {
              echo "<script>
                alert('Booking already exists choose another time slot ')
                
                
            </script> ";
            }
          
             -->