<?php
include 'profilepic-process.php';
   if (isset($_GET['id'])) {
         $id = $_GET['id'];
    }

    if (isset($_POST['submit'])) {
       $title_span = $_POST['title_span'];
       $title = $_POST['title'];
       $t_t = $_POST['timeline_title'];
       $t_date = $_POST['timeline_date'];
       $t_des = $_POST['timeline_des'];
    $sql = "UPDATE experience SET title_span='$title_span', title='$title',timeline_title='$t_t',timeline_date='$t_date',timeline_des='$t_des' WHERE id='$id'";
    
    if (mysqli_query($conn, $sql)) {
      header("location:experience.php?msg=".urlencode("Data Update successfully"));
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
  <title>Experience Update</title>
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
        
             <h4 class="m-0 text-dark text-center">Update Experience Section</h4>
             <?php 

                  $sql = "SELECT * FROM experience WHERE id='$id'";

                  $result = mysqli_query($conn,$sql);
                  $row    = mysqli_fetch_array($result);                

              ?>
             <hr>
             <a href="experience.php" class="btn btn-warning float-right mb-3">Back</a>
             <div class="clearfix"></div>

            <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                      <label>Title_span</label>
                      <input type="text" class="form-control" name="title_span" value="<?php echo $row['title_span'];?>">
                      </div>
                      <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" name="title" value="<?php echo $row['title'];?>">
                      </div>
                      <div class="form-group">
                      <label>Timeline Title</label>
                      <input class="form-control" name="timeline_title"value="<?php echo $row['timeline_title'];?>">
                      </div>
                      <div class="form-group">
                      <label>Timeline Date</label>
                      <input type="text" name="timeline_date" class="form-control" value="<?php echo $row['timeline_date'];?>">
                      </div>
                      <div class="form-group">
                      <label>Timeline Description</label>
                      <textarea class="form-control" name="timeline_des"><?php echo $row['timeline_des'];?></textarea>
                     </div>
                  <button type="submit" class="btn btn-primary btn-block mt-5" name="submit">Update</button>
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
