<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairOneSalon</title>

     <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

</head>
<body>

<?php include("./../../../components/commons/menuComponent.php")?>
<!-- Main Sidebar Container -->
<?php include("./../../../components/commons/sideBarComponent.php")?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  

              <!-- form start -->
              <div class= "row">
                <div class="col-6 offset-3"> 
                  <h1 class="text-center">Registro de roles</h1>
                   <form id="quickForm">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nombre</label>
                          <input type="text" name="nameU" class="form-control" id="" placeholder="Nombre">
                        </div>
                    
                        <!-- /.card-body -->
                        <div class="text-right">
                          <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                      </div>
                  </form>
         
                    <!--/.col (right) -->
              </div>
        
            </div><!-- /.row -->
  
    <!-- /.content -->
  </div>
  <?php include("./../../../components/commons/footerComponent.php")?>