<!-- header -->
<?php include "includes/header.php" ; ?>
<?php include "includes/navbar.php" ;$random = $_SESSION['random']; ?>




  <!-- <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <a class="btn btn-primary btn-block" href="index.php">Login</a>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div> -->


  <section > 

    <div class="container">
        <div class="card card-login mx-auto mt-5">
          <div class="card-header">Login</div>
          <div class="card-body">
            <form method="POST" action="">
              <div class="form-group">
                <div class="form-label-group">
                  <input type="email" id="inputEmail" class="form-control" name="inputEmail" placeholder="Email address" required="required" autofocus="autofocus">
                  <label for="inputEmail">Email address</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="form-group">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="remember-me">
                    Remember Password
                  </label>
                </div>
              </div>
             <!-- <a href="https://docs.google.com/spreadsheets/d/1UxXu8otaJpma81nb2al1IUR33kWb8duC0NhM1MQXkng/edit?ts=5d3071b9#gid=0"><input type="submit" value="Login"name="check" class="btn btn-primary btn-block"></a>  -->
              <!-- <button>Login</button> -->

              <input type="submit" value="Login"name="check"  data-toggle="modal" class="btn btn-primary btn-block">
              <!-- <a class="btn btn-primary btn-block" href="index.php">Login</a> -->
              
            </form>
            <div class="text-center">
              <a class="d-block small mt-3" href="userReg.php">Register an Account</a>
              <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
            </div>
          </div>
        </div>
      </div>

</section>

<?php 

        // submit clicked
        if(isset($_POST['check']))
        {
            // $userName = $_POST['userName'];
        
         echo   $userEmail = $_POST['inputEmail'];

            // $userMobile = $_POST['userMobile']; 
           
            // $userDOB = $_POST['userDOB'];

        echo    $userPassword = $_POST['inputPassword'];

            // session

           $session = "SELECT * FROM CustomerLogin where userEmail = '$userEmail'";
            $session_result = mysqli_query($connection, $session);
            if(!$session_result)
            {
              echo "error".mysqli_error($connection);
            }
            while($row = mysqli_fetch_assoc($session_result))
            {
              $userName_back = $row['userName'];

              $user_id = $row['id'];              

              $userEmail_back = $row['userEmail'];

              $userMobile_back = $row['userMobile']; 

              $userDOB_back = $row['userDOB'];

              $userPassword_back = $row['userPassword'];


            }


            if($userEmail == $userEmail_back && $userPassword == $userPassword_back)
            {
              $_SESSION['userName_back'] = $userName_back;
              $_SESSION['userEmail_back'] = $userEmail_back;
              $_SESSION['userMobile_back'] = $userMobile_back;
              $_SESSION['userDOB_back'] = $userDOB_back;
              $_SESSION['userPassword_back'] = $userPassword_back;
              $_SESSION['user_id'] = $user_id;
              $_SESSION['userDOB_back'] = $userDOB;
             }
            

            $display_query="select * from CustomerLogin 
                          where (userEmail='$userEmail' && userPassword='$userPassword') ";
       
            $result=mysqli_query($connection,$display_query);


             

            $rowcount=mysqli_num_rows($result);
          
            if($rowcount>0)  
            {
              header("Location:book.php");
            }
            // elseif($rowcount1>0)  
            //   {
            //   echo "<script>
            //           window.open('addturf.php');
            //   </script>";
            //   }

            



            else
            {
              // echo " <script>alert('Invalid email or Password')</script> ";
              header("Location:userReg.php");
            }
        } 
            
      ?>


  <!-- footer   -->
  <?php include "includes/footer.php" ; ?>
