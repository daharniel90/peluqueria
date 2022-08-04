<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairOneSalon</title>

     <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

</head>
<body>
=======
>>>>>>> daharniel90/develop

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

 
<<<<<<< HEAD
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  

              <!-- form start -->
              <div class= "row">
                <div class="col-6 offset-3"> 
                  <h1 class="text-center">Registro de roles</h1>
                   <form id="quickForm">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nombre</label>
                          <input type="text" name="nameU" class="form-control" id="" placeholder="Nombre">
                        </div>
                    
                        <!-- /.card-body -->
                        <div class="text-right">
                          <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                      </div>
                  </form>
=======
 
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

     //Show a rol for edit
     if(isset($_POST['edit'])){
      $id=$_POST['id'];


      $sql= "SELECT * FROM roles WHERE id=$id";
      $query_roles = mysqli_query($conn, $sql); 
      $roles = mysqli_fetch_array($query_roles);

    }


    //Update a new rol
    if(isset($_POST['update'])){
      $idRol=$_POST['idRol'];
      $name=$_POST['name'];
      $roles=$_POST['roles'];

      $sql="UPDATE roles SET name = '$name', functions = '$functions' WHERE id = $idRol ";
      $update_roles= mysqli_query($conn, $sql);
        
        if($update_roles){
          ?>
          <div class="alert alert-success" role="alert">
          Rol modificado con exito!
          <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
          </div>

          <?php
        }else{
          ?>
          <div class="alert alert-dismissible alert-danger" role="alert">
          Error al tratar de modificar el rol.
          <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
          </div>
          <?php
        }

        $sql= "SELECT * FROM roles WHERE id=$idRol";
        $query_roles = mysqli_query($conn, $sql); 
        $roles = mysqli_fetch_array($query_roles);
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
                    <input type="text" name="name" class="form-control" id="" placeholder="Nombre" value="<?php if(isset($roles))echo $roles['name'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Funciones</label>
                    <input type="text" name="functions" class="form-control" id="" placeholder="Funciones" value="<?php if(isset($roles))echo $roles['functions'] ?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <?php if(isset($roles)){ ?>
                  <input type="hidden" name="idRol" value=<?php echo $roles['id']?>>
                <?php }?>
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name=<?php if(isset($roles)){echo "update"; }else { echo "submit";}?> value=<?php if(isset($roles)){echo "Guardar"; }else { echo "Registrar";}?>>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
>>>>>>> daharniel90/develop
         
                    <!--/.col (right) -->
              </div>
        
            </div><!-- /.row -->
  
    <!-- /.content -->
  </div>
  <!-- footer -->
  <?php include("./../../../components/commons/footerComponent.php")?>