
<?php

function hola($idCategory, $nameCategory, $color){



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
    $sql= "SELECT * FROM users ";
    $query_users= mysqli_query($conn, $sql);
    $sql= "SELECT * FROM clients";
    $query_clients= mysqli_query($conn, $sql);
  
  
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
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Servicios:</label>
              <select type="select" class="form-control" id="recipient-name">

                <option value="">-</option>
                <?php while($services=mysqli_fetch_array($query_services)){?>
                <option value="<? echo $services["id"]?>"><? echo $services["name"]?></option>
                  <?php }?>
              </select>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Usuarios:</label>
              <select type="select" class="form-control" id="recipient-name">

                <option value="">-</option>
                <?php while($users=mysqli_fetch_array($query_users)){?>
                <option value="<? echo $users["id"]?>"><? echo $users["name"]?> <? echo $users["lastname"]?></option>
                  <?php }?>
              </select>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Clientes:</label>
              <select type="select" class="form-control" id="recipient-name">

                <option value="">-</option>
                <?php while($clients=mysqli_fetch_array($query_clients)){?>
                <option value="<? echo $clients["id"]?>"><? echo $clients["name"]?> <? echo $clients["last_name"]?></option>
                  <?php }?>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Send message</button>
        </div>
      </div>
    </div>
  </div>

<?php
}
?>