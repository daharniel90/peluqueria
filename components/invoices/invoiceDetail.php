<?php

function getInvoiceDetail($conn, $sql, $id){

    if(isset($_POST["delete"])){
      $idServiceDetail = $_POST["id_service"];
      $idUser = $_POST["id_user"];


      $sql="SELECT id FROM service_contract WHERE id_service_detail = $idServiceDetail AND id_user = $idUser AND id_invoice = $id ORDER BY id DESC LIMIT 1";
      $query_select_service_contract= mysqli_query($conn, $sql);
      $sc = mysqli_fetch_array($query_select_service_contract);
      $id_sc = $sc[0]['id'];

      $sqlDelete="DELETE FROM service_contract WHERE id = $id_sc";
      $query_delete_service_contract= mysqli_query($conn, $sqlDelete); echo $sql;  echo $sqlDelete;


      if($query_delete_service_contract){
        ?>
        <div class="alert alert-success" role="alert">
        Servicion eliminado con exito!
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        
        </div>
        <?php
      }else{
        ?>
        <div class="alert alert-dismissible alert-danger" role="alert">
        Error al eliminar el servicio.
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        </div>
        <?php
      }

    }
    

    $sql= "SELECT U.id id_user, U.name AS userName, SD.id, S.name, SD.price, COUNT( S.id ) AS quantity, (COUNT( S.id )* price) AS total, I.id id_invoice
    FROM service_contract SC
    LEFT JOIN users U ON SC.id_user = U.id
    LEFT JOIN service_detail SD ON SC.id_service_detail = SD.id
    LEFT JOIN services S ON SD.id_service = S.id
    LEFT JOIN invoices I ON SC.id_invoice = I.id
    WHERE I.id =$id
    GROUP BY S.id, U.name 
    "; 
    $query_service_contract= mysqli_query($conn, $sql);

    if(mysqli_num_rows($query_service_contract) > 0){

      $tableDetail = 
    '<table class="table table-bordered">
      <tr>
        <td>Descripcion</td>
        <td>Empleado</td>
        <td>Cantidad</td>
        <td>Precio</td>
        <td>Total</td>
        <td>Eliminar</td>
      </tr>';
    
                          
      $total = 0;
      while($service_contract=mysqli_fetch_array($query_service_contract)){
        $total = $total + $service_contract['total'];
                            $name = $service_contract['name'];
                            $userName = $service_contract['userName'];
                            $quantity = $service_contract['quantity'];
                            $price = $service_contract['price'];
                            $total = $service_contract['total'];
                            $total = $service_contract['total'];
                            $id_serviceDetail = $service_contract['id'];
                            $id_user_ = $service_contract['id_user'];
                            $id_invoice_ = $service_contract['id_invoice'];

                            $eliminar = "<form id='delete$id_serviceDetail' action='?' method='post'>
                            <input type='hidden' name='delete' value='delete'>
                            <input type='hidden' name='id_service' value='$id_serviceDetail'>
                            <input type='hidden' name='id_user' value='$id_user_'>
                            <i onclick=\"delete_($id_serviceDetail,'$userName', '$name')\" class='fas fa-minus-circle cursor-over' title='Eliminar'></i>
                            </form>"; 
                            
                            $tableDetail.="<tr>
                            <td> $name</td>
                            <td> $userName</td>
                            <td> $quantity</td>
                            <td> $price $</td>
                            <td> $total $</td>
                            <td> $eliminar</td>
                          </tr>
                          ";
                          
                           
                            }
                        
                          
                            $tableDetail.="</table>";
  
  
  
  
    }else{
      $tableDetail = '
        <div class="alert alert-warning" role="alert">
        Aun no hay servicios asociados a esta factura. Crea uno!
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        
        </div>
      ';
    }

    
  
  
  
  
    return $tableDetail; 
}

    
 
?>
<script>
function delete_(id, name, service){
  if(confirm("Estas seguro de eliminar el servicio "+service+" asociado al empleado "+name+"?")){
    $("#delete"+id).submit();
  }  
}
</script>