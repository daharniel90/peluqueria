<?php 
include("./../../components/commons/sideBarComponent.php");
include("./../../components/commons/menuComponent.php");
include("./../../api/functions/database.php");

$conn = connect();

if(!$conn->connect_error){

  if(isset($_POST['submit'])){
    $dni=$_POST['dni'];
    $observation=$_POST['observation'];

    $sql= "SELECT id FROM users WHERE dni='$dni'";
    $query_user = mysqli_query($conn, $sql); 
    $user = mysqli_fetch_array($query_user);

    $fieldDate='entry_time';

    $sql='SELECT * FROM `assistance` WHERE id_user=3 HAVING DATE_FORMAT(create_at, "%d %m %Y") = DATE_FORMAT(NOW(), "%d %m %Y") 
    ORDER BY id DESC
    limit 1';
    $query_assistence = mysqli_query($conn, $sql); 
    $lastAssistence = mysqli_fetch_array($query_assistence);


    if(mysqli_num_rows($query_assistence) > 0){
      if($lastAssistence["entry_time"] !== '00:00:00'){
        $fieldDate='departure_time';
      }
    
    }

    



    if(mysqli_num_rows($query_user) > 0){
      $idUser = $user['id'];
      $sql="INSERT INTO assistance ($fieldDate, id_user, observations) VALUES (NOW(), $idUser, '$observation')";
      $insert_assistance= mysqli_query($conn, $sql);
      
      if($insert_assistance){
        ?>
        <div class="alert alert-success" role="alert">
        Asistencia registrada con exito!
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        
        </div>
        <?php
      }else{
        ?>
        <div class="alert alert-dismissible alert-danger" role="alert">
        Error al registrar la asistencia.
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        </div>
        <?php
      }
    }else{
      ?>
        <div class="alert alert-dismissible alert-danger" role="alert">
        La cedula no existe
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        </div>
      <?php
    }

    
     
      
  }

}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de asistencias</h1>
          </div>
        </div>
      </div>
    </section>

              <!-- form start -->
              <form id="quickForm" method="post" action="?">
                <div class="card-body">
                <div class="form-group">
                 
                    <label for="exampleInputEmail1">Empleado</label>
                    <input type="text" name="dni"  class="form-control" id="">
                  
                  </div>

                  <div class="form-group">
                 
          
                    <label for="exampleInputEmail1">Observación</label>
                    <input type="text" name="observation"  class="form-control" id="">
                  
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="submit" value="Registrar">
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
  <!-- Footer -->
<?php include("./../../components/commons/footerComponent.php")?>
