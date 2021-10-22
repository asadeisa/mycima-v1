@extends("admin.layout")
<x-header-admin/>
<x-sidebar-admin  movieid="data" />
</header>
<link rel="stylesheet" href="{{ asset("css/download.css")  }} " />

@section("welcompag")
<main style="margin-top: 80px">
  <div class="container my-5 relative">
   @livewire('rating-admin')
    
  </div>
</main>

@endsection
