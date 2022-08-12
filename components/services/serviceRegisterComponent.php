
<?php 
include("./../../components/commons/menuComponent.php");
include("./../../components/commons/sideBarComponent.php");
include("./../../api/functions/database.php");

$conn = connect();

if(!$conn->connect_error){

      $sql= "SELECT * FROM categories";
      $query_categories= mysqli_query($conn, $sql); 

      //Insert a new service
      if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $category=$_POST['category'];
        $price=$_POST['price'];

      $sql="INSERT INTO services (name, id_category) VALUES ('$name', '$category')";
      $insert_services= mysqli_query($conn, $sql);
        
        if($insert_services){
          $idService= mysqli_insert_id($conn);
          $sql="INSERT INTO service_detail (price, id_service) VALUES ($price, $idService)";
          $insert_serviceDetail= mysqli_query($conn, $sql);
          ?>
          <div class="alert alert-success" role="alert">
          Servicio registrado con exito!
          <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
          </div>

          <?php
        }else{
          ?>
          <div class="alert alert-dismissible alert-danger" role="alert">
          Error al registrar el servicio.
          <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
          </div>
          <?php
        }
     }

        //Show a service for edit
        if(isset($_POST['edit'])){
          $id=$_POST['id'];


          $sql= "SELECT S.*, SD.price FROM services S 
          LEFT JOIN service_detail SD ON   S.id =SD.id_service
          WHERE S.id=$id";
          $query_service = mysqli_query($conn, $sql); 
          $service = mysqli_fetch_array($query_service);

        }


        //Update a new service
        if(isset($_POST['update'])){
          $idService=$_POST['idService'];
          $name=$_POST['name'];
          $category=$_POST['category'];
          $price=$_POST['price'];

          $sql="UPDATE services SET name = '$name', id_category = $category WHERE id = $idService ";
          $update_services= mysqli_query($conn, $sql);
            
            if($update_services){
              $sql= "SELECT * FROM service_detail WHERE id_service =$idService ORDER BY id DESC limit 1";
              $query_serviceDetail= mysqli_query($conn, $sql);
              $serviceDetail=mysqli_fetch_array($query_serviceDetail);
              
              if(mysqli_num_rows($query_serviceDetail) > 0){
                if($serviceDetail['price'] != $price){
                  $sql="INSERT INTO service_detail (price, id_service) VALUES ($price, $idService)";
                  $insert_serviceDetail= mysqli_query($conn, $sql);
                }
              }else{
                $sql="INSERT INTO service_detail (price, id_service) VALUES ($price, $idService)";
                $insert_serviceDetail= mysqli_query($conn, $sql);
              }
              
              
              ?>
              <div class="alert alert-success" role="alert">
              Servicio modificado con exito!
              <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
              </div>

              <?php
            }else{
              ?>
              <div class="alert alert-dismissible alert-danger" role="alert">
              Error al tratar de modificar el servicio.
              <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
              </div>
              <?php
            }

            $sql= "SELECT S.*, SD.id id_service_detail, SD.price FROM services S 
            LEFT JOIN service_detail SD ON   S.id =SD.id_service
            WHERE S.id=$idService
            ORDER BY id_service_detail DESC LIMIT 1
            ";
            $query_service = mysqli_query($conn, $sql); 
            $service = mysqli_fetch_array($query_service);
        }



    }
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de servicios</h1>
          </div>
        </div>
      </div>
    </section>

              <!-- form start -->
              <form id="quickForm" method="post" action="?">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">categoria:</label>
                    <select class="form-select" aria-label=".form-select-sm example" name="category">
                        <option value="">-</option>
                      <?php while($category=mysqli_fetch_array($query_categories)){?>
                        
                        <option <?php if(isset($service) && $service['id_category'] == $category['id'] )echo 'selected' ?> value="<? echo $category["id"]?>"><? echo $category["name"]?></option>
                      <?php } ?>
                    </select>  
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" name="name" class="form-control" id="" placeholder="Nombre" value="<?php if(isset($service))echo $service['name'] ?>" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Precio</label>
                    <input type="text" name="price" class="form-control" id="" placeholder="Precio" value="<?php if(isset($service))echo $service['price'] ?>" >
                  </div>
                </div>
                <!-- /.card-body -->
                <?php if(isset($service)){ ?>
                  <input type="hidden" name="idService" value=<?php echo $service['id']?>>
                <?php }?>
                <div class="card-footer">
                  <input type="submit" name=<?php if(isset($service)){echo "update"; }else { echo "submit";}?> class="btn btn-primary" value=<?php if(isset($service)){echo "Guardar"; }else { echo "Registrar";}?>>
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