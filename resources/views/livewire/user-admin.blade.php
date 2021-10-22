<div class=" main-div-component">
    <h3 class="my-3 text-center color-primary ">Users</h3>
  
  
    <div class="show-data">
      <table class="table table-hover">
        <thead class="bg-orange">
          <tr>

            <th scope="col" style="width: 72px;">user name</th>
            <th scope="col" style="width: 72px;">Email</th>
            <th scope="col">filme name</th>
            <th scope="col">Rating</th>
          
      
           
          </tr>
        </thead>
        <tbody >

          @forelse($AllUser as $userdata)


          <tr    id="{{ $userdata->name }}">

            <td class="al{{ $userdata->id }}" rowspan="" >{{ $userdata->name }}</td>
            <td class="al{{ $userdata->id }}" rowspan="">{{ $userdata->email }}</td>
            @forelse($userdata->star as $key=> $starData)
           
                    {{-- {{ $key }} --}}
                    @if($key==0)
                    <td >{{ $starData->movie_name }}</td>
                    <td >{{ $starData->number_stars }}</td>
                    @endif

                @if($key>=1)
            <tr>
              <td 
              class="rowspan-td"
              id="{{ $userdata->id }}"
              data-key="{{ $key+1 }}"
           >{{ $starData->movie_name }}</td>
            <td >{{ $starData->number_stars }}</td>
            </tr>
                @endif
            

            @empty
            <td ></td>
            <td ></td>
            @endforelse
         
       
          
      
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
      let td  = document.querySelectorAll(".rowspan-td");
      if(td !== null )
      {

        td.forEach(element => {
         
          var key =element.dataset.key;
          let spantd = document.querySelectorAll(`.al${ element.id}`);
          spantd.forEach(ele=>{
            ele.rowSpan=key;
            console.log(ele.rowSpan );
          })
         
        });
      }
    </script>
</div>
