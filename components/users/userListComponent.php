<?php
include("./../../components/commons/sideBarComponent.php");
include("./../../components/commons/menuComponent.php");
include("./../../api/functions/database.php");

$conn = connect();

if(!$conn->connect_error){

  if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $sql="DELETE FROM users WHERE id=$id";
    $query_users_delete= mysqli_query($conn, $sql);
  }

  $sql= "SELECT U.*, date_format(U.created_at, '%d-%m-%Y') AS f_created, R.name rol, R.functions FROM users U 
  JOIN user_role UR ON U.id = UR.id_user
  JOIN roles R ON UR.id_rol = R.id
  ";
  $query_users= mysqli_query($conn, $sql); 

  /*if($query_users){
    alert("usuario eliminado");
  }else{
    alert("No se se pudo elimiar el usuario");
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
                      <td>Rol</td>
                      <td>Funciones</td>
                      <td>Fecha de creacion</td>
                      <td>Acciones</td>
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
                      <td><? echo $users["rol"]?></td>
                      <td><? echo $users["functions"]?></td>
                      <td><? echo $users["f_created"]?></td>
                      <td>
                      <form id="edit<?echo $users["id"]?>" action="userRegisterComponent.php" method="post">
                          <input type="hidden" name="edit" value="edit">
                          <input type="hidden" name="id" value="<? echo $users["id"]?>">
                          <i onclick="edit_(<?echo $users['id']?>)" class="fas fa-edit cursor-over" title="Editar"></i>
                        </form>
                      
                        <form id="delete<?echo $users["id"]?>" action="?" method="post">
                          <input type="hidden" name="delete" value="delete">
                          <input type="hidden" name="id" value="<? echo $users["id"]?>">
                          <i onclick="delete_(<?echo $users['id']?>, '<? echo $users['name']?>')" class="fas fa-trash cursor-over" title="Eliminar"></i>
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
  function edit_(id){
    $("#edit"+id).submit(); 
  }


  function delete_(id, name){
    if(confirm("Estas seguro de eliminar este usuario "+name+"?")){
      $("#delete"+id).submit();
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