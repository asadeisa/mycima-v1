@extends("layout.layout")
@section("welcompag")
<x-header></x-header>
<section class="clear-content"
>

  <x-left-sid></x-left-sid>
  <x-right-sid></x-right-sid>
  <link rel="stylesheet" href="{{ asset("css/welcom.css")  }} " />

  {{-- welcom pages  --}}
  <section class="main-page col-lg-7 ">

    <div class="all-movie d-flex">
      @foreach($allmovie as $movie)
        
      <div class="card">
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
          <a href="#!" class="btn btn-primary">show</a>
        </div>
      </div>
      @endforeach

</div>

    {{-- End the welcom page --}}
  </section>
</section>




@endsection
