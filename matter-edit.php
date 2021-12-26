<?php 
    include "header.php";
    $id = $_GET["id"];
?>

<?php

  try {
    include_once 'config/db.php';
    $stmt = "SELECT * FROM materias WHERE id_materias= '$id'";
    $resultado = $conn->query($stmt);
  } catch (Exception $e) {
    $error =$e->getMessage();
    echo $error;
  }

  $materias = $resultado->fetch_assoc();

?>
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Materias</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Materias</li>
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
                <h3 class="card-title">Materias</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <form id="matter" action="matter.php" method="post" name="matter-form">
                    <div class="row">
                      <div class="form-group col-md-6 ">
                        <label for="matterName">Nombre de la materia</label>
                        <input type="text" name="materia_nombre" class="form-control" id="matterName" value="<?php echo $materias['materia_nombre']; ?>">
                      </div>
                      <div class="form-group col-md-6 ">
                        <label for="matterName">Horas catedra</label>
                        <input type="text" name="horas" class="form-control" id="matterName" value="<?php echo $materias['horas']; ?>">
                      </div>
                      <div class="form-group col-md-6 ">
                        <label for="matterName">Nota final</label>
                        <input type="text" name="nota_final" class="form-control" id="matterName" value="<?php echo $materias['nota_final']; ?>">
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
                    <div class="form-group col-md-6 ">
                        <label for="course">Docente</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="docente">
                        <?php 
                          try {
                            include_once 'config/db.php';
                            $stmt = "SELECT * FROM docente";
                            $resultado = $conn->query($stmt);
                          } catch (Exception $e) {
                            $error =$e->getMessage();
                            echo $error;
                          }
                          while($course = $resultado->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $course['apellido']; ?>"><?php echo $course['apellido']; ?></option>

                        <?php } ?>
                          </select>   
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <input type="hidden" name="id_materias" value="<?php echo $id;?>">
                      <input type="hidden" name="matter-form" value="edit">
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
