<?php 
    include "header.php";
    $id = $_GET["id"];
?>

<?php

  try {
    include_once 'config/db.php';
    $stmt = "SELECT * FROM alumnos WHERE id_alumnos= '$id'";
    $resultado = $conn->query($stmt);
  } catch (Exception $e) {
    $error =$e->getMessage();
    echo $error;
  }

  $alumnos = $resultado->fetch_assoc();

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Alumnos</li>
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
                <h3 class="card-title">Alumno</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form id="student-edit" action="student.php" method="post" name="student-form">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Cambiar el nombre</label>
                        <input type="text" class="form-control" value="<?php echo $alumnos['nombre']; ?>" name="nombre">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Cambiar el apellido</label>
                        <input type="text" class="form-control" value="<?php echo $alumnos['apellido']; ?>" name="apellido">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Cambiar el DNI</label>
                        <input type="text" class="form-control" value="<?php echo $alumnos['dni']; ?>" name="dni">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Cambiar el telefono</label>
                        <input type="tel" class="form-control" value="<?php echo $alumnos['telefono']; ?>" name="telefono">
                      </div>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="course">Cambiar la carrera</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="carrera">
                        <?php 
                          try {
                            include_once 'config/db.php';
                            $stmt = "SELECT * FROM carreras";
                            $resultado = $conn->query($stmt);
                          } catch (Exception $e) {
                            $error =$e->getMessage();
                            echo $error;
                          }
                          while($course = $resultado->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $course['carrera']; ?>"><?php echo $course['carrera']; ?></option>

                        <?php } ?>
                          </select>   
                      </div>
                  </div>
                  <!-- /.form-group -->
                  </div>
                  <div class="card-footer">
                    <input type="hidden" name="id_alumnos" value="<?php echo $id; ?>">
                    <input type="hidden" name="student-form" value="edit">
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
