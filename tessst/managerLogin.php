<!-- header -->
<?php include "includes/header.php" ; ?>
<?php include "includes/navbar.php" ; ?>

<section > 

<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="POST">
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

          <input type="submit" value="Login"name="check" class="btn btn-primary btn-block">
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
    
        $userEmail = $_POST['inputEmail'];

        // $userMobile = $_POST['userMobile']; 
       
        // $userDOB = $_POST['userDOB'];

        $userPassword = $_POST['inputPassword'];


        $session1 = "SELECT * FROM ManagerLogin where managerEmail = '$userEmail'";
        $session_result1 = mysqli_query($connection, $session1);
        if(!$session_result1)
        {
          echo "error".mysqli_error($connection);
        }
        while($row = mysqli_fetch_assoc($session_result1))
        {
        echo  $managerName_back = $row['managerName'];

          $manager_id = $row['id'];              

      echo    $managerEmail_back = $row['managerEmail'];

          $managerMobile_back = $row['managerMobile']; 

          $managerDOB_back = $row['managerDOB'];

    echo      $managerPassword_back = $row['managerPassword'];


        }


        if($userEmail == $managerEmail_back && $userPassword == $managerPassword_back)
        {
          $_SESSION['managerName_back'] = $managerName_back;
          $_SESSION['managerEmail_back'] = $managerEmail_back;
          $_SESSION['managerMobile_back'] = $managerMobile_back;
          $_SESSION['userDOB_back'] = $userDOB_back;
          $_SESSION['managerPassword_back'] = $managerPassword_back;
          $_SESSION['usermanager_id'] = $manager_id;
          $_SESSION['managerPassword_back'] = $managerPassword_back;

          $managerPass = $_SESSION['managerPassword_back'] ;
          $managerEmail = $_SESSION['managerEmail_back'] ;
          $managerMobile = $_SESSION['managerMobile_back'] ;
          $managerDOB = $_SESSION['userDOB_back'] ;
          $managerPass = $_SESSION['usermanager_id'] ;
          $managerName= $_SESSION['managerName_back'] ;
        
        }

        


        $display_query="select * from ManagerLogin 
                      where (managerEmail='$userEmail' && managerPassword='$userPassword') ";
   
        $result=mysqli_query($connection,$display_query);

        $rowcount=mysqli_num_rows($result);
        if($rowcount>0)  
        {
         header("Location:manager/index.php");
        }
        else
        {
          echo " <script>alert('Invalid email or Password')</script> ";
          echo "<script>
                     window.open('../index.php');
            </script>";
        }
    } 
        
       
        
  







?>



  <!-- footer   -->
  <?php include "includes/footer.php" ; ?>
