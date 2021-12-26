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
            <h1>Lista de carrera</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lista de carreras</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Carrera</th>
                      <?php if ($_SESSION['role'] == 'Regente' || $_SESSION['role'] == 'Bedel' ) { ?>
                       <th>Acciones</th>
                      <?php } ?>   
                    </tr>
                  </thead>
                  <tbody>
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
                      <tr>
                        <td><?php echo $course['id_carreras']; ?></td>
                        <td><?php echo $course['carrera']; ?></td>
                        <?php if ($_SESSION['role'] == 'Regente' || $_SESSION['role'] == 'Bedel' ) { ?>
                        <td>
                            <a href="course-edit.php?id=<?php echo $course['id_carreras']; ?>" target="_blank" class="btn bg-orange btn-flat margin" rel="noopener noreferrer"><i class="fas fa-edit"></i></a>
                            <a href="#" data-id="<?php echo $course['id_carreras']; ?>" class="btn bg-maroon bnt-flat margin delete" ><i class="fas fa-eraser"></i></a>
                          <?php } ?>
                        </td>
                      </tr>
                    <?php } ?>   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Carrera</th>
                      <?php if ($_SESSION['role'] == 'Regente' || $_SESSION['role'] == 'Bedel' ) { ?>
                      <th>Acciones</th>
                      <?php } ?>   
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php 
    include "footer.php";
    $file = basename($_SERVER['PHP_SELF']);
    echo $file;
    include "scripts/script-$file";
?>
</body>
</html>
