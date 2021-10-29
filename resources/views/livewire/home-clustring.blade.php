<div>
  {{-- {{ dd($relativeMovie) }} --}}
 
<div class="all-movie d-flex">
    {{-- main div of component --}}
  
    @foreach($allmovie as $movie)
        
    <div class="card  ">
      <div class="ribbon"><span>{{ $movie->evaluate }}</span></div>
      <img
         {{-- src="{{asset("storage/avatars/".$img) }}" --}}
        src="{{ asset("storage/avatars/".$movie->img) }}"
        class="card-img-top"
        height="250"
        widht="150"
        alt="..."
      />
      <div class="card-body">
        <h5 class="card-title">{{ $movie->movie_name }}</h5>
        <p class="card-text">
       watch and downloud {{ $movie->movie_name }}
        </p>
        <a href="{{ route("show-filme",$movie->id) }}" class="btn btn-primary">show</a>
      </div>
    </div>
    @endforeach
</div>

</div>