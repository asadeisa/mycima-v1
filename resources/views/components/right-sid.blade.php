
<div class=" col-lg-3 col-md-1 lr-side right-side">
<div class="tooles d-flex flex-column">
  <div class="card w-9">
    <div class="card-body">
      <ul class="list-nice">
        <li  >
          <a href="{{ route("home") }}">
            <h4 class="card-title">Home <i class="fas fa-home color-primary faw-x-larg"></i> </h4>

          </a>
        </li>
        <li>
          <a href="{{ route("home/movie",$is_seres=0) }}">
            <h4> Movie
              <i class="fas fa-film color-primary faw-x-larg ">
                </i></h4> 
          </a>
           
        </li>
        <li>
          <a href="{{ route("home/series",$is_seres=1) }}">

            <h4>
  
              Series
             
              <i class="fas fa-tv color-primary faw-x-larg "></i>
            </h4>
          </a>
        </li>
      </ul>
   
    </div>
  </div>
  {{-- fillter --}}
  <div class="card my-3 ">
    <div class="card-body">
      <h3 class="card-title color-primary" >Filter 
        <i class="fas fa-user-cog color-primary faw-x-larg"></i></h3>
        <hr>
      <ul class="list-nice d-flex felter-ul">
          @php
            $movietype =  ["Action",
                          "Romance",
                          "war",
                          "anime",
                          "drama",
                          "horror",
                          "comic",]
          @endphp
          @for($i = 0; $i < count($movietype); $i++)
            <li>
              <a href="#" class="btn btn-info" >
                
                {{ $movietype[$i]}}
              </a>
            </li>
          @endfor
      </ul>
   
    </div>
  </div>
</div>
</div>