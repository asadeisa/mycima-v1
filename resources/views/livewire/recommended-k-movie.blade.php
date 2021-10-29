<div>
    @if($relativeMovie !== null)

    <h2 class="text-center my-2">recommended to you </h2>
  
  <div class="all-movie d-flex">
    {{-- main div of component --}}
    
      
    
    @forelse($relativeMovie as $Onemovies)
    
  
    
    
    <div class="card">
      <div class="ribbon"><span>{{ $Onemovies->movie->evaluate }}</span></div>
  
      <img
        src="{{ asset("storage/avatars/".$Onemovies->movie->img) }}"
        class="card-img-top"
        height="250"
        widht="150"
        alt="..."
      />
  
      <div class="card-body">
        <h5 class="card-title">{{ $Onemovies->movie->movie_name }}</h5>
        <p class="card-text">
       watch and downloud {{ $Onemovies->movie->movie_name }}
        </p>
        <a href="{{ route("show-filme",$Onemovies->movie->id) }}" class="btn btn-primary">show</a>
      </div>
    </div>
  
    @empty
      
    @endforelse
  </div>
  
  <hr>
  <h2 class="text-center my-2">other</h2>
  @endif
</div>
