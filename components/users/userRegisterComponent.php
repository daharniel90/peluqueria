<?php
 error_reporting(E_ALL);

$connect=mysql_connect('localhost', 'root', 'genesisdsr2003');
$db=mysql_select_db('peluqueria', $connect);


if(isset($_POST['submit'])){
   $name=$_POST['name'];
   $lastname=$_POST['lastname'];
   $dni=$_POST['dni'];
   $phone=$_POST['phone'];
   $address=$_POST['address'];
   $email=$_POST['email'];
   $username=$_POST['username'];
   $password=$_POST['password'];
 
    if($db){  
        $sql="INSERT INTO users (name, lastname, dni, phone, address, email, username, password) VALUES ('$name', '$lastname', '$dni', '$phone', '$address', '$email', '$username', '$password')";
        $insert_users= mysql_query($sql);
        
        if($insert_users){
          ?>
          <div class="alert alert-success" role="alert">
          Usuario registrado con exito!
          <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
          
          </div>
          <?php
        }else{
          ?>
          <div class="alert alert-dismissible alert-danger" role="alert">
          Error al registrar el usuario.
          <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
          </div>
          <?php
        }
    }
}
?>

<?php include("./../../components/commons/menuComponent.php")?>
<!-- Main Sidebar Container -->
<?php include("./../../components/commons/sideBarComponent.php")?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-6">
          <div class="col-sm-6">
            <h1>Registro de usuario</h1>
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
                    <label for="exampleInputEmail1">Apellido</label>
                    <input type="text" name="lastname" class="form-control" id="" placeholder="Apellido">  
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Cedula</label>
                    <input type="text" name="dni" class="form-control" id="" placeholder="Cedula">  
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Telefono</label>
                    <input type="text" name="phone" class="form-control" id="" placeholder="Telefono">  
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Direccion</label>
                    <input type="text" name="address" class="form-control" id="" placeholder="Direccion">  
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail">Email</label>
                    <input type="text" name="email" class="form-control" id="" placeholder="Email">  
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre de usuario</label>
                    <input type="text" name="username" class="form-control" id="" placeholder="Nombre de usuario">  
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Contraseña</label>
                    <input type="text" name="password" class="form-control" id="" placeholder="Contraseña">  
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
  <?php include("./../../components/commons/footerComponent.php")?>