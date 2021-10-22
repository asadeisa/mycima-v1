<div>
    <div class="viewers-rating my-3 px-2 card">
    <h3 class="color-g text-center">Viewers Rating </h3>    
    <div class="card-body">
      @if($numberOfVotes != 0)
          <div class="stras">
            @for($i = 0; $i < 5; $i++)
            @if($i < $avgStars)
            <i  class="fas fa-star color-primary"></i>
            @else
            <i class="far fa-star color-primary"></i>
            @endif
            @endfor
            <div class="my-2">
              <strong> {{$numberOfVotes}}</strong> person rated this filme

            </div>
            <hr>
          </div>
          @endif
          <div class="stras">
            <div class="my-2">
              you can rate now
  
            </div>
            @for($i = 0; $i < 5; $i++)
            @if($i < $ur)
            <i wire:click="modifystars({{ $i }})" class="fas fa-star color-primary"></i>
            @else
            <i wire:click="modifystars({{ $i }})" class="far fa-star color-primary"></i>
            @endif
            @endfor
            
          
          </div>

          <div class="dowenlode my-3">
            The link to download the filme
            <div class="my-1  ">
              <a href="{{ route("download",$movieId) }}" class="btn btn-success">download</a>
            </div>
          </div>
    </div>
    </div> 
   {{-- {{ $movieId }} --}}
</div>
