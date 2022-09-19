<?php 
include("./../../../components/commons/sideBarComponent.php");
include("./../../../components/commons/menuComponent.php");
include("./../../../api/functions/database.php");

 $conn = connect();
 
 if(!$conn->connect_error){

  if(isset($_POST['submit'])){
    $name=$_POST['name'];
     
      $sql="INSERT INTO payment_methods (name) VALUES ('$name')";
      $insert_payment_methods= mysqli_query($conn, $sql);
      
      if($insert_payment_methods){
        ?>
        <div class="alert alert-success" role="alert">
        Metodo de pago registrado con exito!
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        
        </div>
        <?php
      }else{
        ?>
        <div class="alert alert-dismissible alert-danger" role="alert">
        Error al registrar el metodo de pago.
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        </div>
        <?php
      }
  }

        //Show a payment method for edit
        if(isset($_POST['edit'])){
          $id=$_POST['id'];


          $sql= "SELECT * FROM payment_methods WHERE id=$id";
          $query_payment_method = mysqli_query($conn, $sql); 
          $payment_method = mysqli_fetch_array($query_payment_method);

        }



        //Update a new payment method
        if(isset($_POST['update'])){
          $idPayment=$_POST['idPayment'];
          $name=$_POST['name'];

          $sql="UPDATE payment_methods SET name = '$name' WHERE id = $idPayment ";
          $update_payment_methods= mysqli_query($conn, $sql);
            
            if($update_payment_methods){
              ?>
              <div class="alert alert-success" role="alert">
              Metodo de pago modificado con exito!
              <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
              </div>

              <?php
            }else{
              ?>
              <div class="alert alert-dismissible alert-danger" role="alert">
              Error al tratar de modificar el metodo de pago.
              <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
              </div>
              <?php
            }

            $sql= "SELECT * FROM payment_methods WHERE id=$idPayment";
            $query_payment_method = mysqli_query($conn, $sql); 
            $payment_method = mysqli_fetch_array($query_payment_method);
        }






}
?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de metodos de pago</h1>
          </div>
        </div>
      </div>
    </section>

              <!-- form start -->
              <form id="quickForm" method="post" action="?">
                <div class="card-body">
                <div class="form-group">
                 
          
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" name="name"  class="form-control" id="" placeholder="Nombre" value="<?php if(isset($payment_method))echo $payment_method['name'] ?>">
                  
                  </div>
                </div>
                <!-- /.card-body -->
                <?php if(isset($payment_method)){ ?>
                  <input type="hidden" name="idPayment" value=<?php echo $payment_method['id']?>>
                <?php }?>
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name=<?php if(isset($payment_method)){echo "update"; }else { echo "submit";}?> value=<?php if(isset($payment_method)){echo "Guardar"; }else { echo "Registrar";}?>>
                </div>
              </form> 
                  </div>

              </div>
              
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
<?php include("./../../../components/commons/footerComponent.php")?>
