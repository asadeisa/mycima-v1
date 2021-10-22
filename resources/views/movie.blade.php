@extends("layout.layout")
@section("welcompag")
<x-header></x-header>
<section class="clear-content ">

<x-user-tolles  :movieDitaels="$movieDitaels->id" ></x-user-tolles>

  <x-right-sid></x-right-sid>
  <link rel="stylesheet" href="{{ asset("css/movie.css")  }} " />

  {{-- welcom pages  --}}
  <section class="main-page col-lg-6  d-flex justify-center my-4">

    <div class="all-movie d-flex w-9 my-4">
   
        
      <div class="card w-9 p-4">
        <img
          src="{{ asset("storage/avatars/".$movieDitaels->img) }}"
          class="card-img-top"
          height="350"
          widht="200"
          alt="..."
        />

        <div class="card-body">
          <h4 class="card-title color-primary ">{{ $movieDitaels->movie_name }}</h5>
          <p class="card-text">
         watch and downloud {{ $movieDitaels->movie_name }}
          </p>
          <hr>
          <div class="diteals">
            <div class="row">
              <div class="col-sm-4">
                <h5 class="mb-0">Movie Name</h5>
                
              </div>
              <div class="col-sm-8">
                <p  class="text-muted mb-0 color-primary">{{ $movieDitaels->movie_name }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <h5 class="mb-0">language</h5>
                
              </div>
              <div class="col-sm-8">
                <p  class="text-muted mb-0 color-primary">{{ $movieDitaels->language }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <h5 class="mb-0">classification</h5>
                
              </div>
              <div class="col-sm-8">
                <p  class="text-muted mb-0 color-primary">{{ $movieDitaels->classification }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <h5 class="mb-0">type</h5>
                
              </div>
              <div class="col-sm-8">
                <p  class="text-muted mb-0 color-primary">{{ $movieDitaels->type }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <h5 class="mb-0">evaluate</h5>
                
              </div>
              <div class="col-sm-8">
                <p  class="text-muted mb-0 color-primary">{{ $movieDitaels->type }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <h5 class="mb-0">released at</h5>
                
              </div>
              <div class="col-sm-8">
                <p  class="text-muted mb-0 color-primary">{{ $movieDitaels->released }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <h5 class="mb-0">time period</h5>
                
              </div>
              <div class="col-sm-8">
                <p  class="text-muted mb-0 color-primary">{{ $movieDitaels->time_period }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <h5 class="mb-0">the story</h5>
                
              </div>
              <div class="col-sm-8">
                <p  class="text-muted mb-0 color-primary">{{ $movieDitaels->description }}</p>
              </div>
            </div>


          </div>
        </div>
          
      </div>
 

</div>

    {{-- End the welcom page --}}
          {{-- show the hero --}}
          <div class="card mb-4 mb-lg-0 w-9 my-3">
            <h3 class="text-center color-primary my-4"> Herro</h3>
            <div class="card-body p-0">
    
                    <div class="my-2  d-flex  ">
                        @forelse($movieDitaels->actor as $actor)
                        <div class="actor-info w-haf f-wrap d-flex my-3">
                            
                            <div class="profiel img-rounded ">
                                <img  width="70" height="70" laze src="{{ asset("image/actor.png") }}" alt="">
                            </div>
                            <div class="containt d-flex flex-column flex-2">
        
                                <div class="name w-9">
                                   <strong class="inline">{{ $actor->actor_R_name }}</strong> 
            
                                </div>
                                <div class="name w-9">
            
                                   <p class="inline">{{ $actor->actor_name }}</p> 
                                </div>
                                
                                
                            </div>
                        </div>
                        
                        @empty
    
                        @endforelse 
                    </div>   
            </div>
    
        </div>
  </section>
        
</section>

@endsection

