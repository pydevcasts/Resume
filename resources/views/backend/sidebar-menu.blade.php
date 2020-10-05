  

     <!-- Sidebar Menu -->
     <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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
                  <router-link to="/users" class="nav-link">
                    <i class="fas fa-users nav-icon orange"></i>
                    <p>Users</p>
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
              <router-link to="/profile" class="nav-link">
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
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <i class="nav-icon fa fa-power-off red"></i>
                    <p>
                        {{ __('Logout') }}
                    </p>
                 </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->

 

 