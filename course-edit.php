
<?php 
  include "header.php";
  $id = $_GET["id"];
?>

<?php

  try {
    include_once 'config/db.php';
    $stmt = "SELECT * FROM carreras WHERE id_carreras = '$id'";
    $resultado = $conn->query($stmt);
  } catch (Exception $e) {
    $error =$e->getMessage();
    echo $error;
  }

  $course = $resultado->fetch_assoc();

?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Carreras</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Editar carrera</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- right column -->
          <div class="col-md-12">
           <!-- general form elements disabled -->
            <div class="card card-blue">
              <div class="card-header">
                <h3 class="card-title">Editar carreras</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form id="course" action="course.php" method="post" name="course-form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="courseName">Carrera</label>
                    <input type="text" name="carrera" class="form-control" value="<?php echo $course['carrera'];?>" id="courseName">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="hidden" name="id_carreras" value="<?php echo $id;?>">
                  <input type="hidden" name="course-form" value="edit">  
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php 
    include "footer.php";
    $file = basename($_SERVER['PHP_SELF']);
    include "scripts/script-$file";
?>
</body>
</html>
