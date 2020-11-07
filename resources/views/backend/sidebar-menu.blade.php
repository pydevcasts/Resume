  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <router-link to="/dashboard" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt red"></i>
          <p>
            Dashboard
          </p>
        </router-link>
      </li>
      <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-cog green"></i>
          <p>
            Managment
            <i class="right fas fa-angle-left purple"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <router-link to="/developer" class="nav-link">
              <i class="fas fa-users nav-icon orange"></i>
              <p>Developer</p>
              </a>
          </li>
          <li class="nav-item">
            <router-link to="/index_service" class="nav-link">
              <i class="fa fa-id-card nav-icon yellow"></i>
              <p>Service</p>
              </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <router-link to="/index_profile" class="nav-link">
          <i class="nav-icon fas fa-user-alt indigo"></i>
          <p>
            Profile
            <span class="right badge badge-danger">New</span>
          </p>
        </router-link>
      </li>
      <li class="nav-item">
        <router-link to="/index_tag" class="nav-link">
          <i class="nav-icon fas fa-tag orange"></i>
          <p>
            Tag
          </p>
        </router-link>
      </li>
      <li class="nav-item">
        <router-link to="/index_about" class="nav-link">
          <i class="nav-icon fas fa-tty pink"></i>
          <p>
            About
          </p>
        </router-link>
      </li>
      <li class="nav-item">
        <router-link to="/index_gallery" class="nav-link">
          <i class="nav-icon fas fa-file cyan"></i>
          <p>
            Gallery
          </p>
        </router-link>
      </li>
      <li class="nav-item">
        <router-link to="/index_contact" class="nav-link">
          <i class="nav-icon fas fa-comment-alt orange"></i>
          <p>
            Contact
          </p>
        </router-link>
      </li>
      <li class="nav-item">
        <router-link to="/index_pdf" class="nav-link">
          <i class="nav-icon fas fa-file-alt green"></i>
          <p>
            PDF
          </p>
        </router-link>
      </li>
      <li class="nav-item">
        <router-link to="/logout" class="nav-link">
          <i class="nav-icon fa fa-power-off red"></i>
          <p>
            Log Out
          </p>
        </router-link>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->