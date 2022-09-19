<?php 
include("./../../components/commons/menuComponent.php");
include("./../../components/commons/sideBarComponent.php");
include("./../../api/functions/database.php");

$conn = connect();

if(!$conn->connect_error){
  
      $sql= "SELECT * FROM roles";
      $query_roles= mysqli_query($conn, $sql);

      if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $lastname=$_POST['lastname'];
        $dni=$_POST['dni'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $rol=$_POST['rol'];
      
            
      $sql="INSERT INTO users (name, lastname, dni, phone, address, email, user_name, password) VALUES ('$name', '$lastname', '$dni', '$phone', '$address', '$email', '$username', '$password')";
      $insert_users= mysqli_query($conn, $sql);
              
              if($insert_users){
                $idUser= mysqli_insert_id($conn);

                $sql="INSERT INTO user_role (id_user, id_rol) VALUES ($idUser, $rol)";
                $insert_user_role= mysqli_query($conn, $sql);
                        
                        if(!$insert_user_role){
                          ?>
                          <div class="alert alert-dismissible alert-danger" role="alert">
                          Hubo un problema al tratar de asociar el rol a este usuario
                          <?php echo $sql?>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
                          </div>

                          <?php
                        }
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


      //Show an user for edit
     if(isset($_POST['edit'])){
      $id=$_POST['id'];


      $sql= "SELECT U.*, UR.id_rol AS rol FROM users U
      JOIN user_role UR ON U.id = UR.id_user
      WHERE U.id=$id";
      $query_user = mysqli_query($conn, $sql); 
      $user = mysqli_fetch_array($query_user);

    }

    //Update a new user
    if(isset($_POST['update'])){
      $idUser=$_POST['idUser'];
      $name=$_POST['name'];
      $lastname=$_POST['lastname'];
      $dni=$_POST['dni'];
      $phone=$_POST['phone'];
      $email=$_POST['email'];
      $address=$_POST['address'];
      $username=$_POST['username'];
      $password=$_POST['password'];
      $idRol=$_POST['rol'];

      if($password == ''){
        $sql="UPDATE users SET name = '$name', lastname = '$lastname', dni = $dni, phone = $phone, address = '$address', email = '$email', user_name = '$username' WHERE id = $idUser ";
      }else{
        $sql="UPDATE users SET name = '$name', lastname = '$lastname', dni = $dni, phone = $phone, address = '$address', email = '$email', user_name = '$username', password = '$password' WHERE id = $idUser ";
      }
      
      $update_user= mysqli_query($conn, $sql);
        
        if($update_user){

          $sql="UPDATE user_role SET id_rol = $idRol WHERE id_user = $idUser";
          $update_user_role= mysqli_query($conn, $sql);
                        
          if(!$update_user_role){
            ?>
              <div class="alert alert-dismissible alert-danger" role="alert">
                  Hubo un problema al tratar de modificar el rol de este usuario
                  <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
              </div>

          <?php
          }

          ?>
          <div class="alert alert-success" role="alert">
          Usuario modificado con exito!
          <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
          </div>

          <?php
        }else{
          ?>
          <div class="alert alert-dismissible alert-danger" role="alert">
          Error al tratar de modificar el usuario.
          <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
          </div>
          <?php
        }

        $sql= "SELECT U.*, UR.id_rol AS rol FROM users U
        JOIN user_role UR ON U.id = UR.id_user
        WHERE U.id=$idUser";
        $query_user = mysqli_query($conn, $sql); 
        $user = mysqli_fetch_array($query_user);
    }

    }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-6">
          <div class="col-sm-6">
            <h1>Registro de usuarios</h1>

              <!-- form start -->
              <form id="quickForm" method="post" action="?">
                  <div class="card-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Nombre</label>
                      <input type="text" name="name" class="form-control" id="" placeholder="Nombre" value="<?php echo isset($user) ? $user['name'] : '' ?>">   
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Apellido</label>
                      <input type="text" name="lastname" class="form-control" id="" placeholder="Apellido" value="<?php echo isset($user) ? $user['lastname'] : '' ?>">  
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Cedula</label>
                      <input type="text" name="dni" class="form-control" id="" placeholder="Cedula" value="<?php echo isset($user) ? $user['dni'] : '' ?>">  
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Telefono</label>
                      <input type="text" name="phone" class="form-control" id="" placeholder="Telefono" value="<?php echo isset($user) ? $user['phone'] : '' ?>">  
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Direccion</label>
                      <input type="text" name="address" class="form-control" id="" placeholder="Direccion" value="<?php echo isset($user) ? $user['address'] : '' ?>">  
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail">Email</label>
                      <input type="email" name="email" class="form-control" id="" placeholder="Email" value="<?php echo isset($user) ? $user['email'] : '' ?>">  
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Nombre de usuario</label>
                      <input type="text" name="username" class="form-control" id="" placeholder="Nombre de usuario" value="<?php echo isset($user) ? $user['user_name'] : '' ?>">  
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1" class="form-label">Rol:</label>
                          <select class="form-select" aria-label=".form-select-sm example" name="rol">
                              <option value="">-</option>
                            <?php while($rol=mysqli_fetch_array($query_roles)){?>


                              <option <?php echo isset($user) && $user['rol'] == $rol['id']  ? 'selected' : '' ?> value="<?php echo $rol["id"]?>"><?php echo $rol["name"]?></option>
                            <?php } ?>
                              
                              <!--option value="<!? echo $rol["id"]?>"><!? echo $rol["name"]?></option-->
                            <!--?php } ?-->
                          </select>  
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Contraseña</label>
                      <div class="input-group mb-3">
                        <input type="password" id="password" class="form-control" name="password" maxlength="12">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-eye" id="iconEye" onClick="viewPassword('show')"></span>
                            <span class="fas fa-eye-slash itemHidden" id="iconEyeHidden" onClick="viewPassword('hidden')"></span>
                          </div>
                        </div>
                      </div> 
                  </div>
                  
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                  <?php if(isset($user)){?>
                    
                      <input type="hidden" name="idUser" value="<?php echo $user['id']?>">
                      <input type="submit" name="update" class="btn btn-primary" value="Guardar">
                    
                  <?php }else{?>
                      <input type="submit" name="submit" class="btn btn-primary" value="Registrar">
                    <?php }?>
                  </div>

                </form>

          </div>
        </div>
      </div>
    </section>

    <!-- /.content -->
  </div>

  <script>
    function viewPassword(action){
    
      if(action === 'show'){
        $("#iconEye").addClass("itemHidden");
        $("#iconEyeHidden").removeClass("itemHidden");
        $("#password").get(0).type='text';
      }else{
        $("#iconEye").removeClass("itemHidden");
        $("#iconEyeHidden").addClass("itemHidden");
        $("#password").get(0).type='password';
      }
      
      

    }
  </script>
  <!-- footer -->
  <?php include("./../../components/commons/footerComponent.php")?>