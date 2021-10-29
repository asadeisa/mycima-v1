
<div>

  @if($relatedFilme !== null)

  <div class="containt">
  
   
  
  <div id="content" class="all-movie d-flex">
   
    
      
    
    @forelse($relatedFilme as $Onemovies)
    
 
    
    
    <div class="card">
      <img
        src="{{ asset("storage/avatars/".$Onemovies->img) }}"
        class="card-img-top"
        height="250"
        widht="150"
        alt="..."
      />
  
      <div class="card-body">
        <h5 class="card-title">{{ $Onemovies->movie_name }}</h5>
        <p class="card-text">
       watch and downloud {{ $Onemovies->movie_name }}
        </p>
        <a href="{{ route("show-filme",$Onemovies->id) }}" class="btn btn-primary">show</a>
      </div>
    </div>
  
    @empty
      
    @endforelse
  </div>
</div>
{{-- <script>
  setTimeout(() => {
    
    let div  = document.getElementById("content");
    document.getElementById("showContent").addEventListener(()=>{
      div.style.display = "block";
    })
  }, 1500);
</script> --}}
  @endif

      <script>
          Allmovie =<?php  echo $moves;  ?> 
       
       </script>
       <script>
         userListedMovie =<?php  echo $userListedMovie;  ?> 
         console.log(userListedMovie);
       
       </script>
      
  </div>