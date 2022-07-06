
<?php include("./../../components/commons/menuComponent.php")?>
<!-- Main Sidebar Container -->
<?php include("./../../components/commons/sideBarComponent.php")?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de usuario</h1>
          </div>
        </div>
      </div>
    </section>

              <!-- form start -->
              <form id="quickForm">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" name="nameU" class="form-control" id="" placeholder="Nombre">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Apellido</label>
                    <input type="text" name="LnameU" class="form-control" id="" placeholder="Apellido">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="" placeholder="Contraseña">
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="">
                      <label class="custom-control-label" for="exampleCheck1">Acepto los<a href="#">terminos</a>.</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enviar</button>
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
  <!-- footer -->
  <?php include("./../../components/commons/footerComponent.php")?>