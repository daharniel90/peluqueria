<?php
 error_reporting(E_ALL);

$connect=mysql_connect('localhost', 'root', 'genesisdsr2003');
$db=mysql_select_db('peluqueria', $connect);

if($db){

  if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $sql="DELETE FROM quote WHERE id=$id";
    $query_quote_delete= mysql_query($sql);
  }

  $sql= "SELECT * FROM quote";
  $query_quote= mysql_query($sql);
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
                  <h3 class="card-title">Listado de cotizaciones</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <tr>
                      <td>Monto</td>
                      <td>Fecha de creacion</td>
                      <td>Editar</td>
                      <td>Eliminar</td>
                    </tr>
                    <?php 
                      while($quote=mysql_fetch_array($query_quote)){
                    ?>
                    <tr>
                      <td><? echo $quote["amount"]?></td>
                      <td><? echo $quote["date"]?></td>
                      <td>
                        <i class="fas fa-edit"></i>
                      </td>
                      <td>
                        <form id="delete" action="?" method="post">
                          <input type="hidden" name="delete" value="delete">
                          <input type="hidden" name="id" value="<? echo $quote["id"]?>">
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
    if(confirm("Estas seguro de eliminar esta cotizacion?")){
      $("#delete").submit();
    }  
  }
</script>
<!-- Footer -->
<?php include("./../../../components/commons/footerComponent.php")?>
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