<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairOneSalom</title>

     <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

</head>
<body>
<?php include("./../../../components/commons/sideBarComponent.php")?>

<?php include("./../../../components/commons/menuComponent.php")?>

<?php
 error_reporting(E_ALL);

$connect=mysql_connect('localhost', 'root', '123456789');
$db=mysql_select_db('peluqueria', $connect);


if($db){

$sql= "SELECT * FROM payment_methods";
$query_payment_methods= mysql_query($sql);
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
                  <button type="submit" class="btn btn-primary">Registrar</button>
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