<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="plugins/dist/img/petirrojos.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sistema Personal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="plugins/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php $nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; echo $nombre; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="php/sesionPersonal.php" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Personal
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="php/departamentos/departamentosIndex.php" class="nav-link active">
              <i class="nav-icon far fa-building"></i>
              <p>
                Departamentos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="php/puestos/puestosIndex.php" class="nav-link active">
              <i class="nav-icon fas fa-id-badge"></i>
              <p>
                Puestos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="php/materias/materiasIndex.php" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Materias
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          
             
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>