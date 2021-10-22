<div class="header-fixed">

<header>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <h2 class="mx-4" >MYCIIMA</h2>
  <div class="container">
    <!-- Navbar brand -->

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav rest-nave me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a href="{{ route("home") }}">
          <i class="fas fa-home color-primary faw-x-larg"></i>
        </a>
        </li>
        <form class="d-flex input-group w-auto">
          <input
            type="search"
            class="form-control rounded Search"
            placeholder="Search"
            aria-label="Search"
            aria-describedby="search-addon"
          />
          <span class="input-group-text text-white border-0" id="search-addon">
            <i class="fas fa-search"></i>
          </span>
        </form>
      </ul>
      <!-- Left links -->
      <ul class="navbar-nav">
        <!-- Notification dropdown -->
          @if(auth()->user()!= null && auth()->user()->send_not ==1)
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle hidden-arrow"
              href="#"
              id="navbarDropdownMenuLink"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="fas fa-bell"></i>
              <span id="incres-not" class="badge rounded-pill badge-notification bg-danger">0</span>
            </a>
            <ul
              class="dropdown-menu dropdown-menu-end "
              aria-labelledby="navbarDropdownMenuLink"
              id="add-notification"
            >
             
  
            </ul>
          </li>
          @endif
        <!-- Notification dropdown -->
        @if(auth()->user() !==null)
        {{-- logout and profile --}}
        <li class="nav-item me-3 me-lg-0 dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            <i class="fas fa-user"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="#">Action</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Another action</a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            

          <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-primary w-100">
              logout
              <img width="30" height="30" src="{{ asset("image/logout.png") }}" />

            </button>
          </form>
            
          </ul>
        </li>
        @endif
        {{-- langu --}}
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            <i class="united kingdom flag m-0"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="#"
                ><i class="united kingdom flag"></i>English
                <i class="fa fa-check text-success ms-2"></i
              ></a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li>
              <a class="dropdown-item" href="#"><i class="poland flag"></i>Arabic</a>
            </li>
          </ul>
        </li>
      </ul>
      @if(auth()->user() ==null)
      <div class="d-flex align-items-center">
        <a href="{{ route("login") }}" type="button" class="btn btn-link px-3 me-2">
          Login
        </a>
        <a  href="{{route("register") }}" class="btn btn-primary me-3">
          Sign up for free
        </a>
     
      </div>
      @endif
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<script src="{{ asset("js/showNotification.js") }}"></script>

</header>


</div>