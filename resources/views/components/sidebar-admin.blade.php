<div>
     <!-- Sidebar -->
    <nav
         id="sidebarMenu"
         class="collapse d-lg-block sidebar collapse bg-white"
         >
      <div class="position-sticky">
      
        <div class="list-group list-group-flush mx-3 mt-4">
          <a
             href="#"
             {{-- @if( url()->full() ==url('home'))
             class="list-group-item list-group-item-action py-2 ripple active"
             @endif --}}
             class="list-group-item list-group-item-action py-2 ripple"
             aria-current="true"
             >
            <i class="fas fa-tachometer-alt fa-fw me-3"></i
              ><span>Main dashboard</span>
          </a>
          <a 
             href="{{ route("dashboard") }}"
             @if( url()->full() ==url('dashboard'))
             class="list-group-item list-group-item-action py-2 ripple active"
             @endif
           class="list-group-item list-group-item-action py-2 ripple "
             >
            <i class="fas fa-chart-area fa-fw me-3"></i
              ><span>Webiste traffic</span>
          </a>
          <a 
             href="{{ route("dashboard.filem.index") }}"
             @if( url()->full() ==url('dashboard/filem'))
             class="list-group-item list-group-item-action py-2 ripple active"
             @endif
           class="list-group-item list-group-item-action py-2 ripple"
             ><i class="fas fa-lock fa-fw me-3"></i><span>Filem</span></a
            >
      

            @if( $movieid == "id")
          <a
          href="#"
          class="list-group-item list-group-item-action py-2 ripple active"
          class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-chart-line fa-fw me-3"></i
            ><span>manage</span></a
            >
            @endif
            <a
             href="{{ route("dashboard.downloads") }}"
             @if( url()->full() ==url('dashboard/downloads'))
             class="list-group-item list-group-item-action py-2 ripple active"
             @else
             class="list-group-item list-group-item-action py-2 ripple"
             @endif
             >
            <i class="fas fa-chart-pie fa-fw me-3"></i>
            <span>downloads</span>
          </a>
          <a
            href="{{ route("dashboard.actor") }}"
                @if( url()->full() ==url('dashboard/actor'))
             class="list-group-item list-group-item-action py-2 ripple active"
             @else
             class="list-group-item list-group-item-action py-2 ripple"
             @endif
             ><i class="fas fa-chart-bar fa-fw me-3"></i><span>Actors</span></a
            >
          <a
            href="{{ route("dashboard.rating") }}"
            @if( url()->full() ==url('dashboard/rating'))
            class="list-group-item list-group-item-action py-2 ripple active"
            @else
            class="list-group-item list-group-item-action py-2 ripple"
            @endif
             ><i class="fas fa-globe fa-fw me-3"></i
            ><span>Rating</span></a
            >
      
          <a
          href="{{ route("dashboard.users") }}"
          @if( url()->full() ==url('dashboard/users'))
          class="list-group-item list-group-item-action py-2 ripple active"
          @else
          class="list-group-item list-group-item-action py-2 ripple"
          @endif
             ><i class="fas fa-users fa-fw me-3"></i><span>Users</span></a
            >
      
        </div>
      </div>
    </nav>
    <!-- Sidebar -->
</div>