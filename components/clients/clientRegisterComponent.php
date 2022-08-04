
<?php include("./../../components/commons/menuComponent.php")?>
<?php include("./../../components/commons/sideBarComponent.php")?>
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
      $sql= "SELECT * FROM clients";
      $query_clients= mysqli_query($conn, $sql);

  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $lastname=$_POST['lastname'];
    $dni=$_POST['dni'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
     
      $sql="INSERT INTO clients (name, last_name, dni, phone, address) VALUES ('$name', '$lastname', '$dni', '$phone', '$address')";
      $insert_clients= mysqli_query($conn, $sql);
      
      if($insert_clients){
        ?>
        <div class="alert alert-success" role="alert">
       Cliente registrado con exito!
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        
        </div>
        <?php
      }else{
        ?>
        <div class="alert alert-dismissible alert-danger" role="alert">
        Error al registrar el cliente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        </div>
        <?php
      }
  }

        //Show a client for edit
        if(isset($_POST['edit'])){
          $id=$_POST['id'];


          $sql= "SELECT * FROM clients WHERE id=$id";
          $query_client = mysqli_query($conn, $sql); 
          $client = mysqli_fetch_array($query_client);

        }


        //Update a new client
        if(isset($_POST['update'])){
          $idClient=$_POST['idClient'];
          $name=$_POST['name'];

          $sql="UPDATE clients SET name = '$name', last_name = '$lastname', dni = '$dni' phone = '$phone', address = '$address' WHERE id = $idClient ";
          $update_client= mysqli_query($conn, $sql);
            
            if($update_client){
              ?>
              <div class="alert alert-success" role="alert">
              Cliente modificado con exito!
              <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
              </div>

              <?php
            }else{
              ?>
              <div class="alert alert-dismissible alert-danger" role="alert">
              Error al tratar de modificar el cliente.
              <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
              </div>
              <?php
            }

            $sql= "SELECT * FROM clients WHERE id=$idClient";
            $query_client = mysqli_query($conn, $sql); 
            $client = mysqli_fetch_array($query_client);
        }

}

?>









<div class="hold-transition register-page">



<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h1">HairOneSalon</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registrar nuevo cliente</p>

      <form action="?" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nombre" name="name" maxlength="20" value="<?php if(isset($client))echo $client['name'] ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Apellido" name="lastname" maxlength="20" value="<?php if(isset($client))echo $client['last_name'] ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cedula" name="dni" maxlength="20" value="<?php if(isset($client))echo $client['dni'] ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Numero telefonico" name="phone" maxlength="50" value="<?php if(isset($client))echo $client['phone'] ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <textarea class="form-control" placeholder="Direccion" name="address" rows="5" maxlength="100" value="<?php if(isset($client))echo $client['address'] ?>">
          </textarea>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marker-alt"></span>
            </div>
          </div>
        </div>
       
          <!-- /.col -->
          <div class="input-group mb-3">

          
            

            <?php if(isset($client)){?>
                    
                    <input type="hidden" name="idClient" value="<?php echo $client['id']?>">
                    <input type="submit" name="update" class="btn btn-primary" value="Guardar">
                  
                <?php }else{?>
                    <input type="submit" name="submit" class="btn btn-primary" value="Registrar">
                    <button type="reset" class="btn btn-primary">Limpiar</button>
                  <?php }?>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
</div> 


<!-- footer -->
<?php include("./../../components/commons/footerComponent.php")?>
</body>

</html>