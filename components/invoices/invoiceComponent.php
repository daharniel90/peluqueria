<?php
include("./../../components/commons/sideBarComponent.php");
include("./../../components/commons/menuComponent.php");
include("./../../api/functions/database.php");
include("./invoiceDetail.php");

 $conn = connect();
 
 if(!$conn->connect_error){

  if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $sql="DELETE FROM invoices WHERE id=$id";
    $query_invoice= mysqli_query($conn, $sql);
  }

  $sql= "SELECT I.*, C.name,last_name,dni,phone,address, Q.amount FROM invoices I
  JOIN clients C ON I.id_client = C.id
  JOIN quote Q ON I.id_quote = Q.id 
  WHERE I.id = $id
  ";
  $query_invoice= mysqli_query($conn, $sql);
  
  if(mysqli_num_rows($query_invoice) > 0){
    $tableDetail = getInvoiceDetail($conn, $sql, $id);
  }

}



?>





<div class="content-wrapper">
  <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                <img src="/peluqueria/logo-peluqueria.png" alt="AdminLTE Logo">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-borderless">
                  <?php 
                      while($invoice=mysqli_fetch_array($query_invoice)){
                    ?>
                    <tr>
                      <td>N# de factura: <? echo $invoice["id"]?></td>
                      <td>fecha: <? echo $invoice["created_at"]?></td>
                    </tr>
                    <tr>
                      <td>Facturar a: <? echo $invoice["name"]?> <? echo $invoice["last_name"]?></td>
                    </tr>
                    <tr>
                      <td>C.I.: <? echo $invoice["dni"]?></td>
                    </tr>
                    <tr>
                      <td>Direccion: <? echo $invoice["address"]?></td>
                    </tr>
                    <tr>
                      <td>Telefono: <? echo $invoice["phone"]?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <?php echo isset($tableDetail) ? $tableDetail : '<td></td>'?>
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