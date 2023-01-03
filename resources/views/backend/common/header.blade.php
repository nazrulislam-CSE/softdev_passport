  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-danger navbar-light" style="background-color:#17A2B8;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
                @csrf
          <a class="align-items-center d-flex nav-link text-light" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                          this.closest('form').submit();">
                         <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
          </a>
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->