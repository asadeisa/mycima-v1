<div class=" main-div-component">
    <h3 class="my-3 text-center color-primary ">Users</h3>
  
  
    <div class="show-data">
      <table class="table table-hover">
        <thead class="bg-orange">
          <tr>

            <th scope="col">movie name</th>
            <th scope="col">language</th>
            <th scope="col">classification</th>
            <th scope="col">type</th>
            <th scope="col">released</th>
            <th scope="col">evaluate|10</th>
            <th scope="col">User Rating|5</th>
          
      
           
          </tr>
        </thead>
        <tbody >

          @foreach($allRatingMoive as $ratingMovie)
              
          
          <tr  >

              <td >{{ $ratingMovie->movie->movie_name }}</td>
              <td >{{ $ratingMovie->movie->language }}</td>
              <td >{{ $ratingMovie->movie->classification }}</td>
              <td >{{ $ratingMovie->movie->type }}</td>
              <td >{{ $ratingMovie->movie->released }}</td>
              <td >{{ $ratingMovie->movie->evaluate }}</td>
              <td >{{ $ratingMovie->stars /$ratingMovie->total }}</td>
           
          </tr>
          @endforeach
       
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
