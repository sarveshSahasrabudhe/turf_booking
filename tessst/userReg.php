<!-- header -->
<?php include "includes/header.php" ; ?>
<?php include "includes/navbar.php" ; ?>



  
  <div id="content-wrapper">
  

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">User Registration</li>
  </ol>

 


<div class="container">
<div class="card card-register mx-auto mt-5">
<div class="card-header">Register User</div>
<div class="card-body">
  <form action="userReg.php" method="post">
    <div class="form-group">
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-label-group">
            <input type="text" id="userName" name="userName" class="form-control" placeholder=" Name" required="required" autofocus="autofocus">
            <label for="userName">Name</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-label-group">
            <input type="email" id="userEmail" class="form-control" name="userEmail" placeholder="Email" required="required">
            <label for="userEmail">Email</label>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-label-group">
            <input type="number" id="userMobile" name="userMobile" class="form-control" placeholder=" Mobile" required="required" autofocus="autofocus">
            <label for="userMobile">Mobile</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-label-group">
            <input type="date" id="userDOB" class="form-control" name="userDOB" placeholder="Last name" required="required">
            <label for="userDOB">Date of Birth</label>
          </div>
        </div>
      </div>
    </div>
  
    <div class="form-group">
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-label-group">
            <input type="password" id="userPassword" class="form-control" name="userPassword" placeholder="Password" required="required">
            <label for="userPassword">Password</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-label-group">
            <input type="password" id="userConfirmPassword" class="form-control" name="userConfirmPassword" placeholder="Confirm password" required="required">
            <label for="userConfirmPassword">Confirm password</label>
          </div>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-label-group">
            <label for="select">Registration Type</label><br><br>
            <input type="radio" id="select" value="Customer"  name="select" required="required" autofocus="autofocus">Customer <br>
            <input type="radio" id="select" value="Manager" name="select" required="required" autofocus="autofocus">Manager 
          
          </div>
        </div>
      </div>
     </div>






    <input type="submit" value="Register" name="userSubmit" class="btn btn-primary btn-block">
    
  </form>
  <div class="text-center">
    <a class="d-block small mt-3" href="userLogin.php">Customer Login</a>
    <a class="d-block small " href="managerLogin.php">Manager Login </a>
    <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
  </div>
</div>
</div>
</div>
</div>



<?php 

// submit clicked
if(isset($_POST['userSubmit']))
{
// echo "Button clicked";
$userName = $_POST['userName'];

$userEmail = $_POST['userEmail'];

$userMobile = $_POST['userMobile']; 

$userDOB = $_POST['userDOB'];

$userPassword = $_POST['userPassword'];

$userConfirmPassword = $_POST['userConfirmPassword'];

$select = $_POST['select'];








$display_query="select * from CustomerLogin,ManagerLogin
            where (userEmail='$userEmail' && userMobile='$userMobile' && 'Customer'='$select')
             || (managerEmail='$userEmail' && managerMobile='$userMobile' && 'Manager'='$select' )";
 
$result=mysqli_query($connection,$display_query);

$rowcount=mysqli_num_rows($result);
if($rowcount>0)  
{
echo "<script>
      alert('Account already exists ckick OK to login')
       window.open('userLogin.php');
</script>";
}
else
{

if($userPassword == $userConfirmPassword )
  {
    if($select == 'Customer')
    {
      $query = "INSERT INTO CustomerLogin(userName,userEmail,userMobile,userDOB,userPassword) 
      VALUES('$userName','$userEmail','$userMobile','$userDOB','$userPassword')";

       $result = mysqli_query($connection,$query);

      if($result)
      {
          //echo "<script>alert('Registered sucessfully')</script>";
          header("Location:userLogin.php");

      }

       else 
      {
          echo "Adding Error in customer table";
      }
    }
    if($select == 'Manager')
    {
      $query = "INSERT INTO ManagerLogin(managerName,managerEmail,managerMobile,managerDOB,managerPassword) 
      VALUES('$userName','$userEmail','$userMobile','$userDOB','$userPassword')";

       $result = mysqli_query($connection,$query);

      if($result)
      {
          echo "Added sucessfully in manager table";
          header("Location:managerLogin.php");
      }

       else 
      {
          echo "Adding Error in manager table";
      }
    }
}
  else
  {
      echo "<script>alert('Enter valid Password')</script>";
  }

}




  




}


// $display_query = "SELECT userName,userEmail,userMobile,userDOB,userPassword FROM CustomerLogin";
// $displayResult = mysqli_query($connection,$display_query);
// if($displayResult)
// {
//     $row = mysqli_fetch_assoc($displayResult);
//     while ($row)
//     { mysqli_num_row 
//         print_r($row);
//         $row = mysqli_fetch_assoc($displayResult);
//     }
// }



?>

  <!-- footer   -->
  <?php include "includes/footer.php" ; ?>