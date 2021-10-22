<div class=" main-div-component">
    <h3 class="my-3 text-center color-primary ">Filters</h3>
    <div class=" d-flex my-3 text-center justify-center filters " {{-- x-data="{check:'allfilme'}" --}} x-data="{ open: 'allfilme' }">
       
        <button  @click="open = 'allfilme'" x-bind:class=" 
         open =='allfilme' ? 'btn btn-info' : 
        'btn btn-outline-info'"
        wire:click="allmovie()"
        >all filme</button>

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
            <th scope="col">movie name</th>
            <th scope="col">language</th>
            <th scope="col">classification</th>
            <th scope="col">movie/series</th>
            <th scope="col">type</th>
            <th scope="col">evaluate</th>
            <th scope="col">released</th>
            <th scope="col">time_period</th>
            <th scope="col">downloads</th>
          </tr>
        </thead>
        <tbody>
          @forelse($allBuys as $OneSingleMovieData)
            
          <tr>
            <td >{{ $OneSingleMovieData->movie->movie_name }}</td>
            <td >{{ $OneSingleMovieData->movie->language }}</td>
            <td >{{ $OneSingleMovieData->movie->classification }}</td>
            <td >
              @if($OneSingleMovieData->movie->is_series == 0)
              movie
              @else
              series
              @endif
            </td>
            <td >{{ $OneSingleMovieData->movie->type }}</td>
            <td >{{ $OneSingleMovieData->movie->evaluate }}</td>
            <td >{{ $OneSingleMovieData->movie->released }}</td>
            <td >{{ $OneSingleMovieData->movie->time_period }}</td>
            <td >{{ $OneSingleMovieData->total }}</td>
      
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
</div>
