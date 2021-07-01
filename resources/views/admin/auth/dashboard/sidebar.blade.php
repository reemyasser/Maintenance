<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Zahran </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/person.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Session()->get('name')}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if (Session()->has('role') & Session()->get('role')==0)
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{ route('show.orders') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            show all orders

                        </p>
                    </a>
                </li>

              
                <li class="nav-item">
                    <a href="{{ route('create.orders') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            create order

                        </p>
                    </a>

                </li>
               
                    
               @else
                <li class="nav-item">
                  <a href="{{ route('department.dashboard') }}" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                          Dashboard

                      </p>
                  </a>

              </li>
                <li class="nav-item">
                  <a href="{{ route('show.department.orders') }}" class="nav-link">
                    <input type="hidden" value=" {{Session()->get('department_id')}}" name="depart_id">
                      <i class="nav-icon fas fa-table"></i>
                      <p>
                          show department orders
                          <span class="right badge badge-danger"></span>
                      </p>
                  </a>

              </li>
              @if (Session()->get('department_name')=='Electronics')
              <li class="nav-item">
                <a href="{{ route('signup' )}}" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        create user
                        <span class="right badge badge-danger"></span>
                    </p>
                </a>

            </li>
            <li class="nav-item">
              <a href="{{ route('create.techni' )}}" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                      create technicians
                      <span class="right badge badge-danger"></span>
                  </p>
              </a>

          </li>
              @endif
              @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
@section('script')

    <script>
        
    </script>
@endsection
