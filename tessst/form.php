<?php include "includes/header.php" ; ?>
<?php include "includes/navbar.php" ; ?>






<form method="POST">
  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
  </div>
  <input type="submit" value="add " class="btn btn-primary btn-block" name="click">
</form>

<?php 

if(isset($_POST['click']))
{   
    // echo "clicked";
    $post_image = ($_FILES['image']['name']);
    $post_image_temp = ($_FILES['image']['tmp_name']);
    move_uploaded_file($post_image_temp, "images/$post_image");

    $query_insert = "INSERT INTO TurfDetails(turfImages1) values ('$post_image')";
    $result=mysqli_query($connection,$query_insert);
    if($result)
    {
        echo  "addes";
    }


}

?>

<?php include "includes/footer.php" ; ?>