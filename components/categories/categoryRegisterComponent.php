<?php
 error_reporting(E_ALL);
 echo $_POST['name'];
 $connect=mysql_connect('localhost', 'root', 'genesisdsr2003');
 $db=mysql_select_db('peluqueria', $connect);

if(isset($_POST['submit'])){
   $name=$_POST['name'];
 echo $name;
  if($db){  
      $sql="INSERT INTO categories (name) VALUES ('$name')";
      $insert_categories= mysql_query($sql);
      
      if($insert_categories){
        ?>
        <div class="alert alert-success" role="alert">
        Categoria registrada con exito!
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        
        </div>
        <?php
      }else{
        ?>
        <div class="alert alert-dismissible alert-danger" role="alert">
        Error al registrar la categoria.
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        </div>
        <?php
      }
  }
}
?>

<?php include("./../../components/commons/sideBarComponent.php")?>

<?php include("./../../components/commons/menuComponent.php")?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
                    <input type="text" name="name"  class="form-control" id="" placeholder="Nombre">
                  
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>1
</html>