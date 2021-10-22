<div>
    <!--Main Navigation-->

 
   <!-- Navbar -->
   <nav
        id="main-navbar"
        class="navbar navbar-expand-lg navbar-light bg-white fixed-top"
        >
     <!-- Container wrapper -->
     <div class="container-fluid">
       <!-- Toggle button -->
       <button
               class="navbar-toggler"
               type="button"
               data-mdb-toggle="collapse"
               data-mdb-target="#sidebarMenu"
               aria-controls="sidebarMenu"
               aria-expanded="false"
               aria-label="Toggle navigation"
               >
         <i class="fas fa-bars"></i>
       </button>
 
       <!-- Brand -->
       <a class="navbar-brand" href="#">

              <h1>mycima</h1>
       </a>
       <!-- Search form -->
       <form class="d-none d-md-flex input-group w-auto my-auto">
         <input
                autocomplete="off"
                type="search"
                class="form-control rounded"
                placeholder='Search (ctrl + "/" to focus)'
                style="min-width: 225px"
                />
         <span class="input-group-text border-0"
               ><i class="fas fa-search"></i
           ></span>
       </form>
 
       <!-- Right links -->
       <ul class="navbar-nav ms-auto d-flex flex-row">
         <!-- Icon dropdown -->
         <li class="nav-item dropdown">
           <a
              class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow"
              href="#"
              id="navbarDropdown"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
              >
             {{-- <i class="united kingdom flag m-0"></i> --}}
           </a>
           <ul
               class="dropdown-menu dropdown-menu-end"
               aria-labelledby="navbarDropdown"
               >
             <li>
               <a class="dropdown-item" href="#"
                  {{-- ><i class="united kingdom flag"></i>English --}}
                 <i class="fa fa-check text-success ms-2"></i
                   ></a>
             </li>
             <li><hr class="dropdown-divider" /></li>
             <li>
               <a class="dropdown-item" href="#"
                  ><i class="poland flag"></i>Arabic</a
                 >
             </li>
           
           </ul>
         </li>
 
         <!-- Avatar -->
         <li class="nav-item dropdown">
           <a
              class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
              href="#"
              id="navbarDropdownMenuLink"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="true"
              >
             <img
                  src="{{ asset("image/images.png") }}"
                  class="rounded-circle"
                  height="27"
                 
                  loading="lazy"
                  />
           </a>
           <ul
               class="dropdown-menu dropdown-menu-end"
               aria-labelledby="navbarDropdownMenuLink"
               >
             <li><a class="dropdown-item" href="#">My profile</a></li>
             <li><a class="dropdown-item" href="#">Settings</a></li>
             <li>
               <form id="logout-form" action="{{ route('logout') }}" method="POST">
                 @csrf
                 <button type="submit" class="dropdown-item">
                   logout
                   <img width="30" height="30" src="{{ asset("image/logout.png") }}" />
                 </button>
               </form>
              
             </li>
           </ul>
         </li>
       </ul>
     </div>
     <!-- Container wrapper -->
   </nav>
   <!-- Navbar -->
</div>