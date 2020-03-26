<?php include "includes/header.php" ; ?>

<?php include "includes/navbar.php" ; ?>


<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and Date of Birth!</p>
        </div>
        <form method="POST" action="">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" name="inputEmail" placeholder="Enter email address" autofocus="autofocus">
              <label for="inputEmail">Enter email address</label>
            </div>
            <div class="form-label-group">
              <input type="date" id="inputDate" class="form-control" name="inputDate"  " autofocus="autofocus">
              <label for="inputDate">Enter Date Of Birth</label>
            </div>
          </div>
          <!-- <a class="btn btn-primary btn-block" href="userLogin.php">Check Password</a> -->
          <input type="submit" class="btn btn-primary btn-block" name="clicked" value="Check Password">

        </form>
        <div class="text-center">
          <a class="d-block small mt-3" name="clicked" href="userReg.php">Register an Account</a>
          <a class="d-block small" href="login.php">Login Page</a>
        </div>
      </div>
    </div>
  </div>
  <?php
    
    if(isset($_POST['clicked']))
    {
      // echo "clicked";
       $userEmail = $_POST['inputEmail'];
      $userDOB = $_POST['inputDate'];
      
      
      
      

      $display_query="select userPassword from CustomerLogin
                    where (userEmail='$userEmail' && userDOB='$userDOB' )";

        $result=mysqli_query($connection,$display_query);

          $rowcount=mysqli_num_rows($result);
          $row = mysqli_fetch_assoc($result);
          if($rowcount>0)  
        { 
          $userPassword = $row['userPassword'];
          echo 
          "<script>
           alert('Your password is $userPassword');
           window.open('userLogin.php');
           </script>";
          // print_r($row);  
          // echo "<script>
          // window.open('userLogin.php');
          // </script>";
        } 
          
         
        
        else
        {
          echo "<script>
          alert('Account dosent exists ckick OK to register')
          window.open('userReg.php');
          </script>";
        }
    } 
    
    ?>

  <?php include "includes/footer.php" ; ?>
