<<<<<<< HEAD

<?php

error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "1234567890";
$dbname = "peluqueria";
=======
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

  if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $sql="DELETE FROM payment_methods WHERE id=$id";
    $query_payment_method_delete= mysqli_query($conn, $sql);
  }

  $sql= "SELECT * FROM payment_methods";
  $query_payment_method= mysqli_query($conn, $sql);

}
?>

<?php include("./../../../components/commons/sideBarComponent.php")?>

<?php include("./../../../components/commons/menuComponent.php")?>
>>>>>>> daharniel90/develop

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
<<<<<<< HEAD
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
=======
                    
                    <tr>
                      <td>Nombre</td>
                      <td>Fecha de creacion</td>
                      <td>Acciones</td>
                    </tr>

                    <?php 
                      while($payment_method=mysqli_fetch_array($query_payment_method)){
                    ?>
                    <tr>
                      <td><? echo $payment_method["name"]?></td>
                      <td><? echo $payment_method["created_at"]?></td>
                      <td>
                        <form id="edit<?echo $payment_method["id"]?>" action="paymentMethodsRegisterComponent.php" method="post">
                          <input type="hidden" name="edit" value="edit">
                          <input type="hidden" name="id" value="<? echo $payment_method["id"]?>">
                          <i onclick="edit_(<?echo $payment_method['id']?>)" class="fas fa-edit cursor-over" title="Editar"></i>
                        </form>
                      
                        <form id="delete<?echo $payment_method["id"]?>" action="?" method="post">
                          <input type="hidden" name="delete" value="delete">
                          <input type="hidden" name="id" value="<? echo $payment_method["id"]?>">
                          <i onclick="delete_(<?echo $payment_method['id']?>, '<? echo $payment_method['name']?>')" class="fas fa-trash cursor-over" title="Eliminar"></i>
>>>>>>> daharniel90/develop
                        </form>
                      </td>
                    </tr>
                    <?php } ?>
<<<<<<< HEAD
=======
                   
                   
                    
>>>>>>> daharniel90/develop
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
<<<<<<< HEAD
  function delete_(){
    if(confirm("Estas seguro de eliminar este servicio ?")){
      $("#delete").submit();
=======
  function edit_(id){
    $("#edit"+id).submit(); 
  }


  function delete_(id, name){
    if(confirm("Estas seguro de eliminar este metodo de pago "+name+"?")){
      $("#delete"+id).submit();
>>>>>>> daharniel90/develop
    }  
  }
</script>
<!-- Footer -->
<?php include("./../../../components/commons/footerComponent.php")?>
</body>
</html>