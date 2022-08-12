<?php
include("./../../../components/commons/sideBarComponent.php");
include("./../../../components/commons/menuComponent.php");
include("./../../../api/functions/database.php");

 $conn = connect();
 
 if(!$conn->connect_error){

  if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $sql="DELETE FROM payment_methods WHERE id=$id";
    $query_payment_method_delete= mysqli_query($conn, $sql);
  }

  $sql= "SELECT * FROM payment_methods";
  $query_payment_method= mysqli_query($conn, $sql);

}




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
                          <input type="hidden" name="id" value="<? echo $payment_method["id"]?>">
                          <i onclick="delete_(<?echo $payment_method['id']?>, '<? echo $payment_method['name']?>')" class="fas fa-trash cursor-over" title="Eliminar"></i>
                        </form>
                      </td>
                    </tr>
                  
                   
                   
                    
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
  function edit_(id){
    $("#edit"+id).submit(); 
  }


  function delete_(id, name){
    if(confirm("Estas seguro de eliminar este metodo de pago "+name+"?")){
      $("#delete"+id).submit();
    }  
  }
</script>
<!-- Footer -->
<?php include("./../../../components/commons/footerComponent.php")?>
</body>
</html>