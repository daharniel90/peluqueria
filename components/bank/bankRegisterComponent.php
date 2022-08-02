<?php include("./../../components/commons/sideBarComponent.php")?>
<?php include("./../../components/commons/menuComponent.php")?>
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
     
      $sql="INSERT INTO banks (name) VALUES ('$name')";
      $insert_bank= mysqli_query($conn, $sql);
      
      if($insert_bank){
        ?>
        <div class="alert alert-success" role="alert">
        Banco registrado con exito!
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        
        </div>
        <?php
      }else{
        ?>
        <div class="alert alert-dismissible alert-danger" role="alert">
        Error al registrar el banco.
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        </div>
        <?php
      }
  }

        //Show a bank for edit
        if(isset($_POST['edit'])){
          $id=$_POST['id'];


          $sql= "SELECT * FROM banks WHERE id=$id";
          $query_bank = mysqli_query($conn, $sql); 
          $bank = mysqli_fetch_array($query_bank);

        }



        //Update a new bank
        if(isset($_POST['update'])){
          $idbank=$_POST['idBank'];
          $name=$_POST['name'];

          $sql="UPDATE banks SET name = '$name' WHERE id = $idBank ";
          $update_bank= mysqli_query($conn, $sql);
            
            if($update_bank){
              ?>
              <div class="alert alert-success" role="alert">
              Categoria modificada con exito!
              <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
              </div>

              <?php
            }else{
              ?>
              <div class="alert alert-dismissible alert-danger" role="alert">
              Error al tratar de modificar la categoria.
              <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
              </div>
              <?php
            }

            $sql= "SELECT * FROM banks WHERE id=$idBank";
            $query_bank = mysqli_query($conn, $sql); 
            $bank = mysqli_fetch_array($query_bank);
        }






}
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de categoria</h1>
          </div>
        </div>
      </div>
    </section>

              <!-- form start -->
              <form id="quickForm" method="post" action="?">
                <div class="card-body">
                <div class="form-group">
                 
          
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" name="name"  class="form-control" id="" placeholder="Nombre" value="<?php if(isset($bank))echo $bank['name'] ?>">
                  
                  </div>
                </div>
                <!-- /.card-body -->
                <?php if(isset($bank)){ ?>
                  <input type="hidden" name="idBank" value=<?php echo $bank['id']?>>
                <?php }?>
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name=<?php if(isset($bank)){echo "update"; }else { echo "submit";}?> value=<?php if(isset($bank)){echo "Guardar"; }else { echo "Registrar";}?>>
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
