
<?php 
include("./../../../components/commons/menuComponent.php");
include("./../../../components/commons/sideBarComponent.php");
include("./../../../api/functions/database.php");

$conn = connect();

if(!$conn->connect_error){ 

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
  
  <div class="content-wrapper">
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
         
                    <!--/.col (right) -->
              </div>
        
            </div><!-- /.row -->
  
    <!-- /.content -->
  </div>
  <!-- footer -->
  <?php include("./../../../components/commons/footerComponent.php")?>