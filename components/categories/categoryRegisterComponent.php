<?php 
include("./../../components/commons/sideBarComponent.php");
include("./../../components/commons/menuComponent.php");
include("./../../api/functions/database.php");

 $conn = connect();
 
 if(!$conn->connect_error){

  if(isset($_POST['submit'])){
    $name=$_POST['name'];
     
      $sql="INSERT INTO categories (name) VALUES ('$name')";
      $insert_categories= mysqli_query($conn, $sql);
      
      if($insert_categories){
        ?>
        <div class="alert alert-success" role="alert">
        Categoria registrada con exito!
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        
        </div>
        <?php
      }else{
        ?>
        <div class="alert alert-dismissible alert-danger" role="alert">
        Error al registrar la categoria.
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
        </div>
        <?php
      }
  }

        //Show a category for edit
        if(isset($_POST['edit'])){
          $id=$_POST['id'];


          $sql= "SELECT * FROM categories WHERE id=$id";
          $query_category = mysqli_query($conn, $sql); 
          $category = mysqli_fetch_array($query_category);

        }



        //Update a new category
        if(isset($_POST['update'])){
          $idCategory=$_POST['idCategory'];
          $name=$_POST['name'];

          $sql="UPDATE categories SET name = '$name' WHERE id = $idCategory ";
          $update_categories= mysqli_query($conn, $sql);
            
            if($update_categories){
              ?>
              <div class="alert alert-success" role="alert">
              Categoria modificada con exito!
              <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
              </div>

              <?php
            }else{
              ?>
              <div class="alert alert-dismissible alert-danger" role="alert">
              Error al tratar de modificar la categoria.
              <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close"></button>
              </div>
              <?php
            }

            $sql= "SELECT * FROM categories WHERE id=$idCategory";
            $query_category = mysqli_query($conn, $sql); 
            $category = mysqli_fetch_array($query_category);
        }






}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de categoria</h1>
          </div>
        </div>
      </div>
    </section>

              <!-- form start -->
              <form id="quickForm" method="post" action="?">
                <div class="card-body">
                <div class="form-group">
                 
          
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" name="name"  class="form-control" id="" placeholder="Nombre" value="<?php if(isset($category))echo $category['name'] ?>">
                  
                  </div>
                </div>
                <!-- /.card-body -->
                <?php if(isset($category)){ ?>
                  <input type="hidden" name="idCategory" value=<?php echo $category['id']?>>
                <?php }?>
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name=<?php if(isset($category)){echo "update"; }else { echo "submit";}?> value=<?php if(isset($category)){echo "Guardar"; }else { echo "Registrar";}?>>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Footer -->
<?php include("./../../components/commons/footerComponent.php")?>
