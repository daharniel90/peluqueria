
<?php

function createContract($idCategory, $nameCategory, $color){

//SELECT MAX( id ) FROM quote

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


    

    $sql= "SELECT * FROM services WHERE id_category = $idCategory";
    $query_services= mysqli_query($conn, $sql); 



    $sqlInvoice= "SELECT U.id
    FROM invoices I
    JOIN clients C ON I.id_client = C.id
    JOIN quote Q ON I.id_quote = Q.id
    JOIN service_contract SC ON SC.id_invoice = I.id
    JOIN users U ON SC.id_user = U.id 
    WHERE DATE_FORMAT(i.created_at, '%d-%m-%Y') = DATE_FORMAT(NOW(), '%d-%m-%Y')
    AND i.rejected = FALSE
    AND i.paid_bill = FALSE
    ";
    $sql= "SELECT * FROM users WHERE id not in($sqlInvoice) AND active = 1";
    $query_users= mysqli_query($conn, $sql);
    $sql= "SELECT * FROM clients";
    $query_clients= mysqli_query($conn, $sql);



    //Insert a new contract service
    $index = 'create_contract'.$idCategory;
    if(isset($_POST[$index])){
      $id_user=$_POST['id_user'];
      $id_service=$_POST['id_service'];
      $dni_client=$_POST['dni_client'];

        $sql= "SELECT id FROM clients WHERE dni = $dni_client";
        $query_quote= mysqli_query($conn, $sql);
        $client=mysqli_fetch_array($query_quote);
        $id_client = $client[0]['id'];


        $sql= "SELECT MAX(id) FROM quote";
        $query_quote= mysqli_query($conn, $sql);
        $quote=mysqli_fetch_array($query_quote);

        $sql="INSERT INTO invoices (id_client, id_quote, total) VALUES ($id_client, $quote[0], 0)";
        $insert_invoices= mysqli_query($conn, $sql);
        
        if($insert_invoices){
          $idInvoice= mysqli_insert_id($conn);

          $sql= "SELECT MAX(id) FROM service_detail WHERE id_service=$id_service";
          $query_service_detail= mysqli_query($conn, $sql);
          $id_service_detail=mysqli_fetch_array($query_service_detail);

          $sql="INSERT INTO service_contract (id_user, id_service_detail, id_invoice) VALUES ($id_user, $id_service_detail[0], $idInvoice)";
          $insert_service_contract= mysqli_query($conn, $sql);

          if($insert_service_contract){
            $msg ='Contrato registrado con exito!';
          }else{
            $error ='Error al tratar de crear el contrato.';
          }

        }else{
          $error ='Error al tratar de crear la factura.';
        }

   
    }
  
}


?>


  <div class="modal" id="exampleModal<? echo $idCategory?>" tabindex="-1" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header btn-<?php echo $color?>">
          <h5 class="modal-title textUpper" id="exampleModalLabel"><? echo $nameCategory?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="?" id="form<? echo $idCategory?>">
         <div class="modal-body">
          
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Servicios:</label>
              <select type="select" class="form-control" id="recipient-name" name="id_service">

                <option value="">-</option>
                <?php while($services=mysqli_fetch_array($query_services)){?>
                <option value="<? echo $services["id"]?>"><? echo $services["name"]?></option>
                  <?php }?>
              </select>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Usuarios:</label>
              <select type="select" class="form-control" id="recipient-name" name="id_user">

                <option value="">-</option>
                <?php while($users=mysqli_fetch_array($query_users)){?>
                <option value="<? echo $users["id"]?>"><? echo $users["name"]?> <? echo $users["lastname"]?></option>
                  <?php }?>
              </select>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Cliente:</label>
              <input type="text" class="form-control" id="recipient-name" name="dni_client">

            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" name="create_contract<? echo $idCategory?>" onClick="createContract(<? echo $idCategory?>)">Registrar contrato</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <?php
  if(isset($msg)){
    ?>
    <div class="modal <?php echo isset($msg) ? 'itemBlock' : '' ?>" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header btn-success">
          <h5 class="modal-title textUpper" id="exampleModalLabel">Exitoso!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="closeModal()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <div class="modal-body">
          
            <?php echo $msg?>
          
        </div>


      </div>
    </div>
  </div>
    <?php
  }else   if(isset($error)){
    ?>
    <div class="modal <?php echo isset($error) ? 'itemBlock' : '' ?>" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header btn-danger">
          <h5 class="modal-title textUpper" id="exampleModalLabel">Error</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="closeModal()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <div class="modal-body">
          
            <?php echo $error?>
          
        </div>


      </div>
    </div>
  </div>
    <?php
  }
  ?>

<?php
}
?>




<script>
 function createContract(id){
   document.getElementById("form"+id).submit();
 } 

 function closeModal(){
   $("#exampleModal2").removeClass("itemBlock");
   window.location.href = "index.php";
 }
</script>