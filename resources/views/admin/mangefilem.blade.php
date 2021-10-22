@extends("admin.layout")
<x-header-admin/>
<x-sidebar-admin movieid="id"/>
</header>
@section("welcompag")
<link rel="stylesheet" href="{{ asset("css/dachbord/movie-admin.css") }}">
<main style="margin-top: 80px">
  <div class="container my-5 relative">
    <div class="container">
      {{-- code from md --}}
      <section style="background-color: #eee;" >
          <div class="container py-5">
            <div class="row">
              <div class="col-lg-5">
                @livewire('image-uplod', ['movieId' => $filemid])
                @livewire('add-actor', ['movieId' => $filemid])
                @livewire('show-file', ['movieId' => $filemid])
  </div>
</div>
</section>

</div>
  </div>
</main>

@endsection
