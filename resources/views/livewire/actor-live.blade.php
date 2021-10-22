<div class=" main-div-component">
    <h3 class="my-3 text-center color-primary ">Filters</h3>
    <div class=" d-flex my-3 text-center justify-center filters " {{-- x-data="{check:'allfilme'}" --}} x-data="{ open: 'allfilme' }">
      
        <button  @click="open = 'allfilme'" x-bind:class=" 
         open =='allfilme' ? 'btn btn-info' : 
        'btn btn-outline-info'"
        wire:click="allmovie()"
        >all actor</button>

        <button @click="open = 'movie'" x-bind:class="
        open == 'movie' ? 'btn btn-info' : 'btn btn-outline-info'" wire:click="restFilter(0)"
        >movie</button>

        <button @click="open = 'series'" x-bind:class=" 
        open =='series' ? 'btn btn-info' : 'btn btn-outline-info'"
        wire:click="restFilter(1)"
        >series</button>
        <button @click="open = 'mostrated'" x-bind:class="
         open =='mostrated' ? 'btn btn-info' : 'btn btn-outline-info'"
          wire:click="restFilter(6)">most rated</button>
        <button @click="open = 'lastyear'" x-bind:class=" 
        open =='lastyear' ? 'btn btn-info' : 'btn btn-outline-info'"
         wire:click="restFilter(2022)">last year</button>

    </div>
  
    <div class="show-data">
      <table class="table table-hover">
        <thead class="bg-orange">
          <tr>

            <th scope="col" style="width: 72px;">Actor name</th>
            <th scope="col">played a role </th>
            <th scope="col">movie name</th>
            <th scope="col">language</th>
            <th scope="col">movie/series</th>
            <th scope="col">evaluate</th>
            <th scope="col">released</th>
            <th scope="col">mange</th>
           
          </tr>
        </thead>
        <tbody>
          @if (session()->has('message'))
                
          <div class="alert alert-warning "id="delete-warning" data-dismiss="modal">

              {{ session('message') }}

          </div>

          @endif
          @forelse($allactor as $OneSingleActor)


          <tr id="{{ $OneSingleActor->id }}">
            <td >{{ $OneSingleActor->actor_name }}</td>
            <td >{{ $OneSingleActor->actor_R_name }}</td>
            <td >{{ $OneSingleActor->movie->movie_name }}</td>
            <td >{{ $OneSingleActor->movie->language }}</td>
            <td >
              @if($OneSingleActor->movie->is_series == 0)
              movie
              @else
              series
              @endif
            </td>
            <td >{{ $OneSingleActor->movie->evaluate }}</td>
            <td >{{ $OneSingleActor->movie->released }}</td>
            <td >
              <button class="btn btn-danger btn-sm"
              wire:click="deleteActor('{{ $OneSingleActor->id }}')" 
              ><i class="fa fa-trash" aria-hidden="true"></i>delete</button>
             
            </td>
          
      
          </tr>
          @empty
            
          @endforelse
       
        </tbody>
      </table>
    </div>
    <div class=" d-flex my-3 text-center justify-center filters " >
      @if($start >0)
  
      <button wire:click="showmor(0)" class="btn btn-warning mx-2" >show pre</button>
      @endif
          <button wire:click="showmor(1)" class="btn btn-warning mx-2" >show more</button>
      </div>
    <script>

      window.addEventListener('delete-actor', event => {
        document.getElementById(`${event.detail.id}`).style.display = "none";
        setTimeout(() => {
          
          document.getElementById("delete-warning").style.display = "none";
        }, 2000);
      
      })
      
      </script>
</div>
