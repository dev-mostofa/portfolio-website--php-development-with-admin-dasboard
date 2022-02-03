<?php
include 'profilepic-process.php';
   if (isset($_GET['id'])) {
         $id = $_GET['id'];
    }

    if (isset($_POST['submit'])) {
       $name = $_POST['name'];
       $name2 = $_POST['name2'];
       $slogan = $_POST['slogan'];
       $slogan2 = $_POST['slogan2'];
       $cv= $_POST['cv'];
       $profile = $_POST['profile'];
       $image = $_FILES['image']['name'];
       $target = "images/".basename($image);
       $image2 = $_FILES['image2']['name'];
  	   $target = "images/".basename($image2);
    $sql = "UPDATE slide_tbl SET name='$name',name2='$name2',slogan='$slogan',slogan2='$slogan2',cv='$cv',profile='$profile',image='$image',image2='$image2' WHERE id='$id'";
    
    if (mysqli_query($conn, $sql)) {
      header("location:slider.php");
    }
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}
    else
    {
      die("Data update failed").mysqli_error($conn);
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Slide Update</title>
  <link rel="stylesheet" href="../css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
<!--------------------------------------------Top Navbar ---------------------------------------------------->
 <?php include 'top-nav.php';?>
<!---------------------------------------- /Top-nav ------------------------------------------->         
  <!-- /.navbar -->
  <!---------------------------------------- Main Sidebar Container ------------------------------------------->
<!-- Main Sidebar Container -->
<?php include 'aside-nav.php';?>
 <!-------------------------------------------- /Aside -------------------------------------------------------->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10  m-auto">
        
             <h4 class="m-0 text-dark text-center">Update Slider Section</h4>
             <?php 

                  $sql = "SELECT * FROM slide_tbl WHERE id='$id'";

                  $result = mysqli_query($conn,$sql);
                  $row    = mysqli_fetch_array($result);                

              ?>
             <hr>
             <a href="slider.php" class="btn btn-warning float-right mb-3">Back</a>
             <div class="clearfix"></div>

            <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                      <label>Background Image</label>
                      <input type="file" class="form-control" name="image"value="<?php echo $row['image'];?>">
                      </div>
                      <div class="form-group">
                      <label>Background Image 2</label>
                      <input type="file" class="form-control" name="image2"value="<?php echo $row['image2'];?>">
                      </div>
                      <div class="form-group">
                      <label>Title</label>
                      <textarea type="text" class="form-control" name="name" value=""><?php echo $row['name'];?> </textarea>
                      </div>
                      <div class="form-group">
                      <label>Title 2</label>
                      <input type="text" class="form-control" name="name2" value="<?php echo $row['name2'];?>">
                      </div>
                      <div class="form-group">
                      <label>Slogan</label>
                      <input type="text" class="form-control" name="slogan" value="<?php echo $row['slogan'];?>">
                      </div>
                      <div class="form-group">
                      <label>Slogan 2</label>
                      <input type="text" class="form-control" name="slogan2" value="<?php echo $row['slogan2'];?>">
                      </div>
                      <div class="form-group">
                      <label>CV Link</label>
                      <input type="text" name="cv" class="form-control" value="<?php echo $row['cv'];?>">
                      </div>
                      <div class="form-group">
                      <label>Portfolio Link</label>
                      <input type="text" name="profile" class="form-control" value="<?php echo $row['profile'];?>">
                      </div>
                      <button type="submit" class="btn btn-block btn-primary mt-4" name="submit">Update</button>
             </form>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <?php include 'footer.php';?>
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
