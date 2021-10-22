<div class="lr-side left-side  col-md-1 col-lg-2 col-sm-3">
   {{-- main dive --}}

  
    <div class="tooles d-flex flex-column">
      <div class="card w-9">
        <div class="card-body">
          <ul class="l-list-nice">
            @if(auth()->user() == null)
            <li  >
               <a href="{{route("register") }}" class="btn btn-primary" >register</a> 
            </li>
            @endif

            @if(auth()->user() != null)

              @if(auth()->user()->send_not ==0)
              <li  >
                <a href="{{route("set-noti-true") }}" class="btn btn-primary" >Alows notifiction</a> 
              </li>
              @else
              <li  >
                <a href="{{route("set-noti-false") }}" class="btn btn-primary" >cansel notifiction</a> 
            </li>
            @endif
            @endif
              {{-- {{ dd(session()->get('helperinfo')) }} --}}

            @if( session()->get('helperinfo') != "success")

            <li>
               <button
               data-mdb-toggle="modal"
               data-mdb-target="#exampleModal"
               class="btn btn-success" >More Information
              </button> 
                
            </li>
           
            @endif
            <li>
            
                <i class="fas fa-line-chart" ></i>
                <a href="#">
                  top Rated               
                  
                </a>
             
            </li>
            <li>
              <a href="#">
                most watched            
              </a>
            </li>
          </ul>
       
        </div>
      </div>
      {{-- fillter --}}
      <div class="card my-3 ">
        <div class="card-body laung-filter">
          
          <ul class="list-nice d-flex felter-ul">
              @php
                $movielaung =  ["Arabic",
                                  "Spain",
                                  "Korean",
                                  "French",
                                  "German",
                                  "English UK",
                                  "English USA",
                                "Indian",]
              @endphp
              @for($i = 0; $i < count($movielaung); $i++)
                <li>
                  <a href="#" class="btn btn-info btn-sm" >
                    
                    {{ $movielaung[$i]}}
                  </a>
                </li>
              @endfor
          </ul>
       
        </div>
      </div>
    </div>

<!-- Button trigger modal -->





</div>