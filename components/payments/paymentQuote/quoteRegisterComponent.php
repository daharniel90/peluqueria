<?php include("./../../../components/commons/sideBarComponent.php")?>
<?php include("./../../../components/commons/menuComponent.php")?>
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
    $amount=$_POST['amount'];
     
      $sql="INSERT INTO quote (amount) VALUES ('$amount')";
      $insert_quote= mysqli_query($conn, $sql);
      
      if($insert_quote){
        ?>
        <div class="alert alert-success" role="alert">
        Cotizacion registrada con exito!
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        
        </div>
        <?php
      }else{
        ?>
        <div class="alert alert-dismissible alert-danger" role="alert">
        Error al registrar la cotizacion.
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        </div>
        <?php
      }
  }

        //Show a quote for edit
        if(isset($_POST['edit'])){
          $id=$_POST['id'];


          $sql= "SELECT * FROM quote WHERE id=$id";
          $query_quote = mysqli_query($conn, $sql); 
          $quote = mysqli_fetch_array($query_quote);

        }



        //Update a new quote
        if(isset($_POST['update'])){
          $idQuote=$_POST['idQuote'];
          $amount=$_POST['amount'];

          $sql="UPDATE quote SET amount = '$amount' WHERE id = $idQuote ";
          $update_quote= mysqli_query($conn, $sql);
            
            if($update_quote){
              ?>
              <div class="alert alert-success" role="alert">
              Cotizacion modificada con exito!
              <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
              </div>

              <?php
            }else{
              ?>
              <div class="alert alert-dismissible alert-danger" role="alert">
              Error al tratar de modificar la cotizacion.
              <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
              </div>
              <?php
            }

            $sql= "SELECT * FROM quotes WHERE id=$idQuote";
            $query_quote = mysqli_query($conn, $sql); 
            $quote = mysqli_fetch_array($query_quote);
        }






}
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de cotizaciones</h1>
          </div>
        </div>
      </div>
    </section>

              <!-- form start -->
              <form id="quickForm" method="post" action="?">
                <div class="card-body">
                <div class="form-group">
                 
          
                    <label for="exampleInputEmail1">Monto</label>
                    <input type="text" name="amount"  class="form-control" id=""  value="<?php if(isset($quote))echo $quote['amount'] ?>">
                  
                  </div>
                </div>
                <!-- /.card-body -->
                <?php if(isset($quote)){ ?>
                  <input type="hidden" name="idQuote" value=<?php echo $quote['id']?>>
                <?php }?>
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name=<?php if(isset($quote)){echo "update"; }else { echo "submit";}?> value=<?php if(isset($quote)){echo "Guardar"; }else { echo "Registrar";}?>>
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
<?php include("./../../../components/commons/footerComponent.php")?>
