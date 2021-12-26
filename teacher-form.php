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
            <h1>Datos del docente</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Datos del docente</li>
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
                <h3 class="card-title">Docente</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form id="teacher" action="teacher.php" method="post" name="teacher-form">
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
                  </div>
                  <!-- /.form-group -->
                  </div>
                  <div class="card-footer">
                      <input type="hidden" name="role" value="2">
                      <input type="hidden" name="teacher-form" value="add">
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
