<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin/home')}}" class="brand-link">
         <img src="{{url('admin/images/368237198_1609214429606351_7641225145172056315_n.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ProMina</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                    <a href="{{url('admin/album')}}" class="nav-link">
                      <i class="nav-icon far fa-image"></i>
                      <p>
                        Gallery
                      </p>
                    </a>
                  </li>
                  
                <li class=" user-panel d-flex nav-item">
                    <a href="{{ url('admin/logout') }}" class="nav-link"><i
                            class="nav-icon fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
