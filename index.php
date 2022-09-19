<?php include("./components/commons/menuComponent.php")?>
<!-- Main Sidebar Container -->
<?php 
include("./components/commons/sideBarComponent.php");
include("./components/contracts/contractsRegisterComponent.php");
include("./components/payments/payInvoice.php");
include("./components/invoices/invoiceDetail.php");
include("./api/functions/global.php");
?>









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

  $sql= "SELECT * FROM categories";
  $query_categories= mysqli_query($conn, $sql);

  
  if(isset($_POST["id"])){
    $id = $_POST["id"];
  }

  if(isset($_POST["reject"])){

    $sql= "UPDATE invoices SET rejected = TRUE WHERE id = $id";
    $query_reject= mysqli_query($conn, $sql);
    if($query_reject){
      $alert = createMsgAlert('success', 'Factura anulada con exito!');
    }else{
      $alert = createMsgAlert('danger', 'Error al tratar de anular la factura!');
    } 
  }

  if(isset($_POST["active_user"])){
    $active = $_POST["status"];
    if(!$active){
      $active_msg = 'activado';
    }else{
      $active_msg = 'desactivado';
    }

    $sql= "UPDATE users SET active = !active WHERE id = $id";
    $query_active= mysqli_query($conn, $sql);
    if($query_active){
      $alert = createMsgAlert('success', "Usuario $active_msg con exito!");
    }else{
      $alert = createMsgAlert('danger', "Error, el usuario no pudo ser $active_msg");
    }
  }

  $sqlInvoice= "SELECT I. * , C.name name_client, last_name, C.dni, Q.amount
  FROM invoices I
  JOIN clients C ON I.id_client = C.id
  JOIN quote Q ON I.id_quote = Q.id
  WHERE DATE_FORMAT(i.created_at, '%d-%m-%Y') = DATE_FORMAT(NOW(), '%d-%m-%Y')
  ";
  $query_invoice= mysqli_query($conn, $sqlInvoice);

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

  $sql= "SELECT U.*, R.name rol FROM users U
  JOIN user_role UR ON U.id = UR.id_user
  JOIN roles R ON UR.id_rol = R.id
  WHERE U.id not in($sqlInvoice)
  ";
  $query_users= mysqli_query($conn, $sql);

  
  
}
?>




<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php if(isset($alert)){ alert($alert); } ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">C-Panel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Panel de Control 1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

        <?php 
          while($category=mysqli_fetch_array($query_categories)){
            createContract($category['id'], $category['name'], $category['color']);
        ?>
          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div data-toggle="modal" data-target="#exampleModal<?php echo $category['id']?>" data-whatever="@mdo" class="small-box btn btn-<?php echo $category['color']?>">
              <div class="inner">
                <h3 class="textUpper"><?php echo $category['name']?></h3>

                <p>-</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Ver mas <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <?php }?>
          <!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button-->

         
          </div>

        
            <div class="row">
            <section class="col-lg-8 connectedSortable">

            <!-- LISTA DE ESPERA -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Facturas.
                </h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm">
                    <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-bordered table-hover">
                    
                    <tr>
                      <td>N# de factura</td>
                      <td>Cedula del cliente</td>
                      <td colspan=2>Cliente</td>
                      <td>Cotizacion</td>
                      <td>Total</td>
                      <td>Estado</td>
                      <td>Acciones</td>
                    </tr>
                      <?php 
                      if(mysqli_num_rows($query_invoice)> 0 ){

                      
                        while($invoice=mysqli_fetch_array($query_invoice)){
                          ?>
                          <tr>
                            <td><?php echo $invoice["id"]?></td>
                            <td><?php echo $invoice["dni"]?></td>
                            <td><?php echo $invoice["name_client"]?></td>
                            <td><?php echo $invoice["last_name"]?></td>
                            <td><?php echo $invoice["amount"]?> Bs.</td>
                            <td><?php echo $invoice["total"]?> $.</td>
                            <td><small class="badge badge-<?php echo $invoice['rejected'] > 0 ? 'danger' : ($invoice['paid_bill'] == 0 ? 'warning' : 'success'); ?>"> <?php echo $invoice['rejected'] > 0 ? 'anulada' : ($invoice["paid_bill"] == 0 ? 'No Pagada' : 'Pagada')?></small>
                            <td >
                              <i onClick="viewDetail(<?php echo $invoice['id']?>)" class="fas fa-search cursor-over text-primary" title="Ver factura"></i>
                              <?php if($invoice['rejected'] == 0 && $invoice['paid_bill'] == 0){ ?>
                                
                                <i onClick="rejectInvoice(<?php echo $invoice['id']?>)" class="fas fa-ban cursor-over text-danger" title="Anular factura"></i>
                                <form id="formReject<?php echo $invoice['id']?>" action="?" method="POST">
                                  <input type="hidden" name="id" value="<?php echo $invoice['id']?>">
                                  <input type="hidden" name="reject">
                                </form>
                              
                              <i onClick="openModalPayInvoice(<?php echo $invoice['id']?>)" class="fas fa-money-check-alt cursor-over text-success" title="Pagar factura"></i>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalpayInvoice<?php echo $invoice['id']?>" data-whatever="@mdo<?php echo $invoice['id']?>">Open modal for @mdo</button>
                              <?php echo $invoice['id']?>
                              <?php payClientService($conn, $invoice['id']);?>
                              
                              <?php }?>
                            </td>
                       
                          </tr>

                          <tr class="itemHidden" id="detailContract<?php echo $invoice["id"]?>">
                            <td colspan="9">
                            <?php echo getInvoiceDetail($conn, $sql, $invoice["id"]);?>
                          </td>
                          </tr>
                          
               
                          <?php  } 
                        }else{
                          ?>
                          <div class="alert alert-warning" role="alert">
                            Aun no hay facturas registradas el dia de hoy. Crea una!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
                            
                          </div>
                          <?php
                        }
                          
                          ?>
              </table>
              <!-- /.card body -->
              </div>
              
            <!-- /.card -->
              </div>
          </section>
          </div>
          




          <div class="row">
          <section class="col-lg-4 connectedSortable">
          <!-- LISTA DE EMPLEADOS -->
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Disponibilidad de empleados.
                </h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <?php 
                      while($users=mysqli_fetch_array($query_users)){
                    ?>
                <ul class="todo-list" data-widget="todo-list">
                  <li>
                    
                    <!-- checkbox -->
                    <div  class="icheck-primary d-inline ml-2">
                      <form id="formActive<?php echo $users['id']?>" action="?" method="POST">
                        <input type="hidden" value="<?php echo $users['id']?>" name="id">
                        <input type="hidden" value="<?php echo $users['active']?>" name="status">
                        <input type="hidden" value="" name="active_user">
                      </form>
                      <input type="checkbox" <?php echo $users['active'] == true ? '' : 'checked' ?> value="<?php echo $users['active'] == 1 ? false : true ?>" name="active" onChange="activeUser(<?php echo $users['id']?>)">
                      <label for="todoCheck"></label>
                      
                    </div>
                    <!-- todo text -->
                   
                    <span class="text"><?php echo $users["rol"]?> <?php echo $users["name"]?> <?php echo $users["lastname"]?> </span>
                    <!-- Emphasis label -->
                    <small class="<?php echo $users['active'] == true ? 'badge badge-primary' : 'badge badge-secondary' ?>"><i class="<?php echo $users['active'] == true ? 'fas fa-user-check' : 'far fa-clock'?>"></i> <?php echo $users['active'] == true ? 'Activo' : 'Inactivo'?></small>
                    <!-- General tools such as edit or delete-->
                    
                  </li>
                  
                 
                  
                </ul>
              
              <?php 

                      } ?>
            </div>
            <!-- /.card -->
            </div>
          </section>
          </div>
          
          
          
          <div class="row">
          <section class="col-lg-5 connectedSortable">

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          </div>
          <!-- right col -->
        
        <!-- /.row (main row) -->
      <!-- /.container-fluid -->
    
      </div>
    </section>
    <!-- /.content -->
  
  </div>
</div>
  <!-- /.content-wrapper -->

  <script>
   function getIdCategory(id){
     window.location.href = "/peluqueria/index.php?idCategory="+id;
   }

   function viewDetail(id){
    
    if($("#detailContract"+id).hasClass("itemHidden")){
      $("#detailContract"+id).removeClass("itemHidden");
    }else{
      $("#detailContract"+id).addClass("itemHidden");
    }

  }

  function openModalPayInvoice(id){
    
    if($("#modalpayInvoice"+id).hasClass("itemHidden")){
      $("#modalpayInvoice"+id).removeClass("itemHidden");
    }else{
      $("#modalpayInvoice"+id).addClass("itemHidden");
    }

  }

  function rejectInvoice(id){
  if(confirm("Estas seguro de anular la factura N# "+id+"?")){
    $("#formReject"+id).submit();
  }  
}

  function activeUser(id){
    $("#formActive"+id).submit();
  }
  
  </script>

   <!-- footer -->
   <?php include("./components/commons/footerComponent.php")?>








   