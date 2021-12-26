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
            <h1>Alta de usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
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
                <h3 class="card-title">Usuarios</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form id="users" action="users.php" method="post" name="users-form">
                  <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email del Alumno" name="mail">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Rol</label>
                          <select class="form-control select2bs4" style="width: 100%;" name="rol" id="rol">
                          <option selected="selected" disabled>Selecione el rol del usuario</option>
                        <?php 
                          try {
                            include_once 'config/db.php';
                            $stmt = "SELECT * FROM rol";
                            $resultado = $conn->query($stmt);
                          } catch (Exception $e) {
                            $error =$e->getMessage();
                            echo $error;
                          }
                          while($course = $resultado->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $course['perfil']; ?>"><?php echo $course['perfil']; ?></option>

                        <?php } ?>
                          </select>   
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password del Alumno" name="pass" id="pass">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Confirme el Password</label>
                        <input type="password" class="form-control" placeholder="Reingrese el Password del Alumno" name="pass_again">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <input type="hidden" name="users" value="add">
                      <input type="hidden" name="users-form" value="add">
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
