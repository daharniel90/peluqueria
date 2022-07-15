
<?php

error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "1234567890";
$dbname = "peluqueria";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Ha fallado la conexión a base de datos: " . $conn->connect_error);
}else{

  if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $sql="DELETE FROM payment_methods WHERE id=$id";
    $query_payment_methods_delete = mysqli_query($conn, $sql);
  }

  $sql= "SELECT * FROM payment_methods";
  $query_payment_methods= mysqli_query($conn, $sql);
}
?>

<?php include("./../../../components/commons/sideBarComponent.php")?>

<?php include("./../../../components/commons/menuComponent.php")?>
<div class="content-wrapper">

  <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Listado de métodos de pago</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <tr>
                      <td>Método</td>
                      <td>Fecha de creacion</td>
                      <td>Editar</td>
                      <td>Eliminar</td>
                    </tr>
                    <?php 
                      while($method=mysqli_fetch_array($query_payment_methods)){
                    ?>
                    <tr>
                      <td><? echo $method["name"]?></td>
                      <td><? echo $method["created_at"]?></td>
                      <td>
                        <i class="fas fa-edit"></i>
                      </td>
                      <td>
                        <form id="delete" action="?" method="post">
                          <input type="hidden" name="delete" value="delete">
                          <input type="hidden" name="id" value="<? echo $method['id']?>">
                          <i onclick="delete_()" class="fas fa-trash"></i>
                        </form>
                      </td>
                    </tr>
                    <?php } ?>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div>
  </section>

</div>
<script>
  function delete_(){
    if(confirm("Estas seguro de eliminar este servicio ?")){
      $("#delete").submit();
    }  
  }
</script>
<!-- Footer -->
<?php include("./../../../components/commons/footerComponent.php")?>
</body>
</html>