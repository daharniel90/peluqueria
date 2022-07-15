
<?php include("./../../../components/commons/menuComponent.php")?>
<?php include("./../../../components/commons/sideBarComponent.php")?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<?php
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "genesisdsr2003";
$dbname = "peluqueria";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

 
 
  if ($conn->connect_error) {
    die("Ha fallado la conexión a base de datos: " . $conn->connect_error);
  }else{ 

      if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $functions=$_POST['functions'];

      $sql="INSERT INTO roles (name, functions) VALUES ('$name', '$functions')";
      $insert_roles= mysqli_query($conn, $sql);
        
        if($insert_roles){
          ?>
          <div class="alert alert-success" role="alert">
          Rol registrado con exito!
          <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
          </div>

          <?php
        }else{
          ?>
          <div class="alert alert-dismissible alert-danger" role="alert">
          Error al registrar el rol.
          <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
          </div>
          <?php
        }
     }
    }
?>
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de roles</h1>
          </div>
        </div>
      </div>
    </section>

              <!-- form start -->
              <form id="quickForm" method="post" action="?">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" name="name" class="form-control" id="" placeholder="Nombre">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Funciones</label>
                    <input type="text" name="functions" class="form-control" id="" placeholder="Funciones">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" name="submit" class="btn btn-primary" value="Registrar">
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- footer -->
  <?php include("./../../../components/commons/footerComponent.php")?>