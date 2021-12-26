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
            <h1>Lista de usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lista de usuarios</li>
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
                    <th>Password</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      try {
                        include_once 'config/db.php';
                        $stmt = "SELECT * FROM usuarios";
                        $resultado = $conn->query($stmt);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }
                      while($users = $resultado->fetch_assoc()) {
                    ?>
                      <tr>
                        <td><?php echo $users['id_usuarios']; ?></td>
                        <td><?php echo $users['pass']; ?></td>
                        <td><?php echo $users['mail']; ?></td>
                        <td><?php echo $users['rol']; ?></td>
                        
                        <td>
                          <a href="users-edit.php?id=<?php echo $users['id_usuarios']; ?>" target="_blank" class="btn bg-orange btn-flat margin" rel="noopener noreferrer"><i class="fas fa-edit"></i></a>
                          <a href="#" data-id="<?php echo $users['id_usuarios']; ?>" class="btn bg-maroon bnt-flat margin delete" ><i class="fas fa-eraser"></i></a>
                        </td>
                      </tr>
                    <?php }?>   
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
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
