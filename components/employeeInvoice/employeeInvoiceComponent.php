<?php
include("./../../components/commons/sideBarComponent.php");
include("./../../components/commons/menuComponent.php");
include("./../../api/functions/database.php");

 $conn = connect();
 
 if(!$conn->connect_error){

  if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $sql="DELETE FROM employee_invoices WHERE id=$id";
    $query_employee_invoice= mysqli_query($conn, $sql);
  }

  $sql= "SELECT EI.*, U.name,lastname,dni,phone,address, Q.amount FROM employee_invoices EI
  JOIN users U ON EI.id_user = U.id
  JOIN quote Q ON EI.id_quote = Q.id 
  WHERE EI.id = $id
  ";
  $query_employee_invoice= mysqli_query($conn, $sql);
  
  /*if(mysqli_num_rows($query_employee_invoice) > 0){
    $sql= "SELECT S.id, S.name, SD.price, COUNT( S.id ) AS quantity, (COUNT( S.id )* price) AS total
    FROM service_contract SC
    LEFT JOIN users U ON SC.id_user = U.id
    LEFT JOIN services S ON SC.id_service = S.id
    LEFT JOIN service_detail SD ON SC.id_service_detail = SD.id
    LEFT JOIN invoices I ON SC.id_invoice = I.id
    WHERE I.id =$id
    GROUP BY S.id
    "; echo $sql;
    $query_service_contract= mysqli_query($conn, $sql);
  }*/

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
                      while($employee_invoice=mysqli_fetch_array($query_employee_invoice)){
                    ?>
                    <tr>
                      <td>N# de factura: <? echo $employee_invoice["id"]?></td>
                      <td>fecha: <? echo $employee_invoice["created_at"]?></td>
                    </tr>
                    <tr>
                      <td>Facturar a: <? echo $employee_invoice["name"]?> <? echo $employee_invoice["lastname"]?></td>
                    </tr>
                    <tr>
                      <td>C.I.: <? echo $employee_invoice["dni"]?></td>
                    </tr>
                    <tr>
                      <td>Direccion: <? echo $employee_invoice["address"]?></td>
                    </tr>
                    <tr>
                      <td>Telefono: <? echo $employee_invoice["phone"]?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <table class="table table-bordered">
                        <tr>
                          <td>Descripcion</td>
                          <td>Cantidad</td>
                          <td>Precio</td>
                          <td>Total</td>
                        </tr>
                        <!--?php 
                        $total = 0;
                        while($service_contract=mysqli_fetch_array($query_service_contract)){
                          $total = $total + $service_contract['total'];
                        ?>
                        <tr>
                          <td><!?php echo $service_contract['name']?></td>
                          <td><!?php echo $service_contract['quantity']?></td>
                          <td><!?php echo $service_contract['price']?> $</td>
                          <td><!?php echo $service_contract['total']?> $</td>
                        </tr>
                        <!?php 
                          }
                        ?>
                      </table>
                    </tr>
                   
                   
                    
                  </table>
                  <!?php echo $total?> $
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