<?php
include("./../../components/commons/sideBarComponent.php");
include("./../../components/commons/menuComponent.php");
include("./../../api/functions/database.php");

 $conn = connect();
 
 if(!$conn->connect_error){

  if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $sql="DELETE FROM invoices WHERE id=$id";
    $query_invoice= mysqli_query($conn, $sql);
  }

  $sql= "SELECT I. * , C.name name_client, last_name, C.dni, Q.amount, SC.id_user, U.name, lastname
  FROM invoices I
  JOIN clients C ON I.id_client = C.id
  JOIN quote Q ON I.id_quote = Q.id
  JOIN service_contract SC ON SC.id_invoice = I.id
  JOIN users U ON SC.id_user = U.id
  ";
  
  $query_invoice= mysqli_query($conn, $sql);

}
?>



<div class="content-wrapper">
  <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Listado de facturas de clientes</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    
                    <tr>
                      <td>Cedula del cliente</td>
                      <td colspan=2>Cliente</td>
                      <td colspan=2>Usuario</td>
                      <td>Cotizacion</td>
                      <td>Total</td>
                      <td>Factura pagada</td>
                      <td>Acciones</td>
                    </tr>

                    <?php 
                      while($invoice=mysqli_fetch_array($query_invoice)){
                    ?>
                    <tr>
                      <td><? echo $invoice["dni"]?></td>
                      <td><? echo $invoice["name_client"]?></td>
                      <td><? echo $invoice["last_name"]?></td>
                      <td><? echo $invoice["name"]?></td>
                      <td><? echo $invoice["lastname"]?></td>
                      <td><? echo $invoice["amount"]?> Bs.</td>
                      <td><? echo $invoice["total"]?> $.</td>
                      <td><? echo $invoice["paid_bill"]?></td>
                      <td>
                        <form id="edit<?echo $invoice["id"]?>" action="invoiceComponent.php" method="post">
                          <input type="hidden" name="edit" value="edit">
                          <input type="hidden" name="id" value="<? echo $invoice["id"]?>">
                          <i onclick="edit_(<?echo $invoice['id']?>)" class="fas fa-search cursor-over" title="Ver factura"></i>
                        </form>
                      
                        <form id="delete<?echo $invoice["id"]?>" action="?" method="post">
                          <input type="hidden" name="delete" value="delete">
                          <input type="hidden" name="id" value="<? echo $invoice["id"]?>">
                          <i onclick="delete_(<?echo $invoice['id']?>, '<? echo $invoice['name']?>')" class="fas fa-trash cursor-over" title="Eliminar"></i>
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
  function edit_(id){
    $("#edit"+id).submit(); 
  }


  function delete_(id, name){
    if(confirm("Estas seguro de eliminar esta factura "+name+"?")){
      $("#delete"+id).submit();
    }  
  }
</script>
<!-- Footer -->
<?php include("./../../components/commons/footerComponent.php")?>
</body>
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</html>