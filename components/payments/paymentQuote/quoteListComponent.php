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
    $sql="DELETE FROM quote WHERE id=$id";
    $query_quote_delete= mysqli_query($conn, $sql);
  }

  $sql= "SELECT * FROM quote
  ORDER BY id DESC";
  $query_quote= mysqli_query($conn, $sql);

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
                      <td>Acciones</td>
                    </tr>

                    <?php 
                      while($quote=mysqli_fetch_array($query_quote)){
                    ?>
                    <tr>
                      <td><? echo $quote["amount"]?> Bs.</td>
                      <td><? echo $quote["date"]?></td>
                      <td>
                        <form id="edit<?echo $quote["id"]?>" action="quoteRegisterComponent.php" method="post">
                          <input type="hidden" name="edit" value="edit">
                          <input type="hidden" name="id" value="<? echo $quote["id"]?>">
                          <i onclick="edit_(<?echo $quote['id']?>)" class="fas fa-edit cursor-over" title="Editar"></i>
                        </form>
                      
                        <form id="delete<?echo $quote["id"]?>" action="?" method="post">
                          <input type="hidden" name="delete" value="delete">
                          <input type="hidden" name="id" value="<? echo $quote["id"]?>">
                          <i onclick="delete_(<?echo $quote['id']?>, '<? echo $quote['amount']?>')" class="fas fa-trash cursor-over" title="Eliminar"></i>
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
    if(confirm("Estas seguro de eliminar esta cotizacion "+name+"?")){
      $("#delete"+id).submit();
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