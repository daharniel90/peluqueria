<?php 
include("./../../components/commons/menuComponent.php"); 
include("./../../components/commons/sideBarComponent.php");
include("./../../api/functions/database.php");

 $conn = connect();
 
 if(!$conn->connect_error){

  if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $sql="DELETE FROM service_contract WHERE id=$id";
    $query_service_contract_delete = mysqli_query($conn, $sql);
  }

  $sql= "SELECT SC.*, U.name uname,lastname,dni, S.name, SD.price, I.id FROM service_contract SC
  JOIN users U ON SC.id_user = U.id
  JOIN service_detail SD ON SC.id_service_detail = SD.id
  JOIN services S ON SD.id_service = S.id
  JOIN invoices I ON SC.id_invoice = I.id";
  $query_service_contract= mysqli_query($conn, $sql);
}
?>


<div class="content-wrapper">
  <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Listado de Contratos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <tr>
                      <td colspan=2>Usuario</td>
                      <td>Cedula</td>
                      <td>Servicio</td>
                      <td>Precio</td>
                      <td>N# de factura</td>
                      <td>Acciones</td>
                    </tr>
                    <?php 
                      while($service_contract=mysqli_fetch_array($query_service_contract)){
                    ?>
                    <tr>
                      <td><?php echo $service_contract["uname"]?></td>
                      <td><?php echo $service_contract["lastname"]?></td>
                      <td><?php echo $service_contract["dni"]?></td>
                      <td><?php echo $service_contract["name"]?></td>
                      <td><?php echo $service_contract["price"]?> $</td>
                      <td><?php echo $service_contract["id"]?></td>
                      <td>
                        <form id="edit<?echo $service_contract["id"]?>" action="contractsRegisterComponent.php" method="post">
                          <input type="hidden" name="edit" value="edit">
                          <input type="hidden" name="id" value="<? echo $service_contract["id"]?>">
                          <i onclick="edit_(<?echo $service_contract['id']?>)" class="fas fa-edit cursor-over" title="Editar"></i>
                        </form>
                        <form id="delete<?echo $service_contract["id"]?>" action="?" method="post">
                          <input type="hidden" name="delete" value="delete">
                          <input type="hidden" name="id" value="<? echo $service_contract["id"]?>">
                          <i onclick="delete_(<?echo $service_contract['id']?>, '<? echo $service_contract['name']?>')" class="fas fa-trash cursor-over" title="Eliminar"></i>
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
    if(confirm("Estas seguro de eliminar el contrato "+name+"?")){
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