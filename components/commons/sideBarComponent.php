<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/peluqueria/index.php" class="brand-link">
      <img src="/peluqueria/logo-peluqueria.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-2" style="opacity: .8">
      <span class="brand-text font-weight-light">HairOneSalon</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/peluqueria/barberialogo.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/peluqueria/index.php" class="d-block">Administradores</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <!--i class="nav-icon fas fa-tachometer-alt"></i-->
              <p>
                Panel de Control
                <!--i class="right fas fa-angle-left"></i-->
              </p>
            </a>
           <!--ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Panel de Control 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Panel de Control 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Panel de Control 3</p>
                </a>
              </li>
            </ul-->
          </li>
          <!--li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Usuarios
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/peluqueria/components/users/userRegisterComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar Usuario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/peluqueria/components/users/userListComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/peluqueria/components/users/roles/rolRegisterComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar rol</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/peluqueria/components/users/roles/rolListComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de roles</p>
                </a>
              </li>
              
              <!--li class="nav-item">
                <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar <small>Empleados</small></p>
                </a>
              </li-->
              <!--li class="nav-item">
                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Navbar</p>
                </a>
              </li-->
              <!--li class="nav-item">
                <a href="pages/layout/fixed-footer.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Footer</p>
                </a>
              </li-->
              <!--li class="nav-item">
                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collapsed Sidebar</p>
                </a>
              </li-->
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-id-card-alt"></i>
              <p>
                Empleados
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/peluqueria/components/employee/assistanceRegisterComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registro de asistencia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/peluqueria/components/employee/assistanceListComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de asistencia</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Clientes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/peluqueria/components/clients/clientRegisterComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registro de clientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/peluqueria/components/clients/clientListComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de clientes</p>
                </a>
              </li>
              <!--li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li-->
              <!--li class="nav-item">
                <a href="pages/charts/uplot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>uPlot</p>
                </a>
              </li-->
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Servicios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/peluqueria/components/services/serviceRegisterComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar servicio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/peluqueria/components/services/serviceListComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de servicio</p>
                </a>
              </li>
            <li class="nav-item">
                <a href="/peluqueria/components/categories/categoryRegisterComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar categoria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/peluqueria/components/categories/categoryListComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de categoria</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Pagos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/peluqueria/components/payments/paymentMethods/paymentMethodsRegisterComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar metodos de pago</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/peluqueria/components/payments/paymentMethods/paymentMethodsListComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de metodos de pago</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/peluqueria/components/payments/paymentQuote/quoteRegisterComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registar cotizacion</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/peluqueria/components/payments/paymentQuote/quoteListComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado cotizaciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/peluqueria/components/payments/paymentsClientListComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado pago clientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/peluqueria/components/payments/paymentsEmployeeListComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado pago empleados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/peluqueria/components/invoices/invoiceListComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de facturas de clientes</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Contratos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/peluqueria/components/contracts/contractsListComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de contratos</p>
                </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/peluqueria/components/contracts/contractsRegisterComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p></p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="/peluqueria/components/contracts/contractsRegisterComponent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registro de contrato</p>
                </a>
              </li>

            </ul>
          </li>
         
        </ul>
        <!-- /.sidebar-menu -->
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>