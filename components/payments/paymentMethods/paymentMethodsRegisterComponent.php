<?php include("./../../../components/commons/sideBarComponent.php")?>

<?php include("./../../../components/commons/menuComponent.php")?>

<?php
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "1234567890";
$dbname = "peluqueria";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

 if(isset($_POST['submit'])){
   $name=$_POST['name'];
 
  if ($conn->connect_error) {
    die("Ha fallado la conexión a base de datos: " . $conn->connect_error);
  }else{  
      $sql="INSERT INTO payment_methods (name) VALUES ('$name')";
      $insert_services= mysqli_query($conn, $sql);
        
        if($insert_services){
          ?>
          <div class="alert alert-success" role="alert">
          Método registrado con exito!
          <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
          </div>

          <?php
        }else{
          ?>
          <div class="alert alert-dismissible alert-danger" role="alert">
          Error al registrar el método.
          <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
          </div>
          <?php
        }
    }
  }
?>

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-6 offse-3">
            
          </div>
        </div>
      </div>
    </section>

              <!-- form start -->
              <div class= "row">
                  <div class="col-6 offset-3"> 
                  <h1 class="text-center">Registro métodos de pago</h1>
                   <form id="quickForm">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" name="nameU" class="form-control" id="" placeholder="Nombre">
                  </div>
              </div>
                <!-- /.card-body -->
                <div class="text-right">
                <input type="submit" name="submit" class="btn btn-primary" value="Registrar">
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
</body>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</html>