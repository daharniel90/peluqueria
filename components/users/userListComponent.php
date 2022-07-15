<?php
 error_reporting(E_ALL);

$connect=mysql_connect('localhost', 'root', 'genesisdsr2003');
$db=mysql_select_db('peluqueria', $connect);

if($db){ 

  if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $sql="DELETE FROM users WHERE id=$id";
    $query_users_delete= mysqli_query($conn, $sql);
  }

  $sql= "SELECT * FROM users";
  $query_users= mysqli_query($conn, $sql); 

  /*if($query_users){
    alert("usuario eliminado");
  }else{
    alert("No se se pudo elimiar el usuario");
  }*/
}
?>
<?php include("./../../components/commons/sideBarComponent.php")?>

<?php include("./../../components/commons/menuComponent.php")?>

<div class="content-wrapper">
  <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Listados de usuarios</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <tr>
                      <td>Nombre</td>
                      <td>Apellido</td>
                      <td>Cedula</td>
                      <td>Telefono</td>
                      <td>Direccion</td>
                      <td>Email</td>
                      <td>Fecha de creacion</td>
                      <td>Editar</td>
                      <td>Eliminar</td>
                    </tr>
                    <?php 
                      while($users=mysqli_fetch_array($query_users)){
                    ?>
                    <tr>
                      <td><? echo $users["name"]?></td>
                      <td><? echo $users["lastname"]?></td>
                      <td><? echo $users["dni"]?></td>
                      <td><? echo $users["phone"]?></td>
                      <td><? echo $users["address"]?></td>
                      <td><? echo $users["email"]?></td>
                      <td><? echo $users["created_at"]?></td>
                      <td>
                        <i class="fas fa-user-edit"></i>
                      </td>
                      <td>
                        <form id="delete" action="?" method="post">
                          <input type="hidden" name="delete" value="delete">
                          <input type="hidden" name="id" value="<? echo $categories["id"]?>">
                          <i onclick="delete_()" class="fas fa-user-times"></i>
                        </form>
                       
                      </td>
                    </tr>
                    <?php 

                      } ?>
                    
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
    if(confirm("Estas seguro de eliminar a este usuario?")){
      $("#delete").submit();
    }  
  }
</script>
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