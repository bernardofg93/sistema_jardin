<!-- Main Sidebar Container -->
<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="<?= base_url ?>layout/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">Administrador</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user-tie"></i>
          <p>
            Personal
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url ?>usuario/registro" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Registro</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url ?>usuario/gestion" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Administración</p>
            </a>
          </li>
        </ul>
      </li>

      <!-- Pacientes -->
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Pacientes
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url ?>entrevista/paciente" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Entrevista Inicial</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url ?>paciente/registro" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Registro</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url ?>paciente/administracion" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Administración</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper kanban">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">