<?php 
    include "header.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Datos de alumno</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Datos de lumnos</li>
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
                <form id="student" action="student.php" method="post" name="student-form">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Nombre del Alumno" name="nombre">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Apellido</label>
                        <input type="text" class="form-control" placeholder="Apellido del Alumno" name="apellido">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>DNI</label>
                        <input type="text" class="form-control" placeholder="DNI del Alumno" name="dni">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Telefono</label>
                        <input type="tel" class="form-control" placeholder="Telefono del alumno" name="telefono">
                      </div>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="course">Carreras</label>
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
                      <input type="hidden" name="role" value="2">
                      <input type="hidden" name="student-form" value="add">
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
