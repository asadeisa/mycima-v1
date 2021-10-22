
@extends("admin.layout")
<x-header-admin/>
<x-sidebar-admin  movieid="data" />
</header>
@section("welcompag")
<link rel="stylesheet" href="{{ asset("css/dachbord/movie-admin.css") }}">
<main style="margin-top: 80px">
  <div class="container my-5 relative">

  <div class="row mt-3 mx-3 py-3 gradient-custom my-4 relative top-10" >
    <div class="col-md-3">
      <div style="margin-top: 50px; margin-left: 10px;" class="text-center">
       
        <h3 class="mt-3 text-white">note</h3>
        <p class="white-text">You can add movie or series ,all filed is requered </p>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-white btn-rounded back-button">Go back</button>
      </div>
  
  
    </div>
    <div class="col-md-9 justify-content-center">
      <div class="card card-custom pb-4">
        <div class="card-body mt-0 mx-5">
          <div class="text-center mb-3 pb-2 mt-3">
            <h4 style="color: #495057 ;">Add New Movie  </h4>
          </div>
  
          <form class="mb-0 dropzone"  id="my-awesome-dropzone"
           action="{{ route("dashboard.filem.store") }}"
            method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
              <div class="col">
                @if($errors->any())
                <h5 class="error">{{$errors->first()}}</h5>
                @endif
                <div class="form-outline">
                  <input type="text" name="name" id="form6Example1" class="form-control input-custom" />
                  <label class="form-label" for="form6Example1">movie name</label>
                </div>
              </div>
              {{-- dropdown --}}
              <div class="dropdown col disable-border" 
              x-data="{languages:'languages'}">
                <button
                  class="btn btn-outline-primary dropdown-toggle"
                  type="button"
                  id="dropdownMenuButton"
                  data-mdb-toggle="dropdown"
                  aria-expanded="false"
                  x-text="languages"
                >
                languages
                </button>
                <ul class="dropdown-menu" 
                id="languages-list"
                aria-labelledby="dropdownMenuButton">
                  <li><a x-on:click.prevent="languages = 'Arabic' " class="dropdown-item" href="#">Arabic</a></li>
                  <li><a x-on:click.prevent="languages = 'English USA' "class="dropdown-item" href="#">English USA</a></li>
                  <li><a x-on:click.prevent="languages = 'English UK' "class="dropdown-item" href="#">English UK</a></li>
                  <li><a x-on:click.prevent="languages = 'Spain' "class="dropdown-item" href="#">Spain </a></li>
                  <li><a x-on:click.prevent="languages = 'Korean' "class="dropdown-item" href="#">Korean  </a></li>
                  <li><a x-on:click.prevent="languages = 'French' "class="dropdown-item" href="#">French   </a></li>
                  <li><a x-on:click.prevent="languages = 'German' "class="dropdown-item" href="#">German     </a></li>
                  <li><a x-on:click.prevent="languages = 'Indian' "class="dropdown-item" href="#">Indian    </a></li>
                  <input  type="hidden"
                
                   x-model="languages"
                    name="languages">
                </ul>
              </div>
              {{-- end drop --}}
             
            </div>
            <div class="row mb-4">
             {{-- dropdown --}}
             <div class="dropdown col disable-border" x-data="{classification:'classification'}">
              <button
                class="btn btn-outline-primary dropdown-toggle"
                type="button"
                id="dropdownMenuButton"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
                x-text="classification"
              >
              classification
              </button>
              <ul class="dropdown-menu"
              id="classification-list"
               aria-labelledby="dropdownMenuButton">
                <li><a  x-on:click.prevent="classification='for kied [G]'" class="dropdown-item" href="#">for kied [G]</a></li>
                <li><a  x-on:click.prevent="classification='[PG+13]'" class="dropdown-item" href="#">[PG+13] </a></li>
                <li><a  x-on:click.prevent="classification='[R] for adult'" class="dropdown-item" href="#">[R] for adult  </a></li>
                <li><a  x-on:click.prevent="classification='Parents supervision [PG]'" class="dropdown-item" href="#">Parents' supervision [PG]</a></li>
                <li><a  x-on:click.prevent="classification='unclassified'" class="dropdown-item" href="#">unclassified    </a></li>
                <input type="hidden" name="classification"  x-model="classification">
              </ul>
            </div>
            {{-- end drop --}}
              <div class="col">
                {{-- radio --}}
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="filme"
                    id="inlineRadio1"
                    value="1"
                  />
                  <label class="form-check-label" for="inlineRadio1">series</label>
                </div>
                
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="filme"
                    id="inlineRadio2"
                    value="0"
                    checked
                  />
                  <label class="form-check-label" for="inlineRadio2">movie</label>
                </div>
                
              </div>
            </div>
            <div class="row mb-4">
               {{-- dropdown --}}
               <div x-data="{Type:'Type'}" 
               class="dropdown col disable-border">
                <button
                  class="btn btn-outline-primary dropdown-toggle"
                  type="button"
                  id="dropdownMenuButton"
                  data-mdb-toggle="dropdown"
                  aria-expanded="false"
                  x-text="Type"
                >
                Type
                </button>
                <ul class="dropdown-menu drop-get-val"
                id="type-list"
                 aria-labelledby="dropdownMenuButton">
                  <li><a x-on:click.prevent="Type='Action'" class="dropdown-item" href="#">Action</a></li>
                  <li><a x-on:click.prevent="Type='Romance'" class="dropdown-item" href="#">Romance</a></li>
                  <li><a  x-on:click.prevent="Type='war'" class="dropdown-item" href="#">war </a></li>
                  <li><a x-on:click.prevent="Type='anime'" class="dropdown-item" href="#">anime </a></li>
                  <li><a x-on:click.prevent="Type='drama'" class="dropdown-item" href="#">drama    </a></li>
                  <li><a x-on:click.prevent="Type='horror'" class="dropdown-item" href="#">horror     </a></li>
                  <li><a x-on:click.prevent="Type='comic'" class="dropdown-item" href="#">comic     </a></li>
                    <input type="hidden" id="type" name="type" x-model="Type"> 
                </ul>
              </div>
              {{-- end drop --}}
              <div class="col">
                <div class="form-outline">
                  <input type="number" max="10"step="0.1" name="stars" min="1" id="typeEmail" class="form-control input-custom" />
                  <label class="form-label" for="typeEmail">evaluate</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
             
              <div class="col">
                <div class="form-outline">
                  {{-- <input type="time" name="movieLength"   id="typeEmail" class="form-control input-custom" /> --}}
                  <div class="time ">
                    <input type="number"min="0" max="4" step="1" name="h" >:
                    <input type="number"min="0" max="59"step="1"  name="m" >:
                    <input type="number"min="0" max="59"step="1"  name="s" >
                    <label class="form-label mx-6" for="typeEmail">movie length </label>
                  </div>
                </div>
            </div>
              <div class="col">
                <div class="form-outline">
                  <input type="number" name="yearRel" max="2200"
                   step="1" min="1990" id="typeEmail" class="form-control input-custom" />
                  <label class="form-label" for="typeEmail">year of release </label>
                </div>
            </div>
            </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <textarea name="description" class="form-control input-custom" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <label for="exampleFormControlTextarea1" class="form-label">The story</label>
                  </div>
              </div>
            
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline fallback">
                    <input type="file" name="avatar" id="filepond"  />
                    {{-- <label for="exampleFormControlTextarea1" class="form-label">description</label> --}}
                  </div>
              </div>
            
              </div>
            </div>
  
            <div class="float-end d-flex">
              <!-- Submit button -->
              <button type="submit"
               class="btn btn-primary btn-rounded flex-center my-5"

                style="background-color: #0062CC ;">Add</button>
            </div>
  
          </form>
        </div>
      </div>
    </div>
  </div>
            {{-- show the movie --}}
  <div class="container">
    
    <table class="table  table-hover">
      <thead class="wheat" style="background-color: #0062CC ;">
        <tr >
          <th scope="col">name</th>
          <th scope="col">language</th>
          <th scope="col">classification</th>
          <th scope="col">type</th>
          <th scope="col">movie/series</th>
          <th scope="col">evaluate</th>
          <th scope="col">released</th>
          <th scope="col">time period</th>
       
        </tr>
      </thead>
      <tbody>
        {{-- @livewire('show-file') --}}
        @forelse($allmovie as $movie)
        
        <tr>
         
          <td> <a href="{{ route("dashboard.filem.show",$movie->id) }}"  >
 
          {{ $movie->movie_name }}</a></td>
          <td>{{ $movie->language }}</td>
          <td>{{ $movie->classification }}</td>
          <td>{{ $movie->type }}</td>
          <td>
            @if($movie->is_series)
            series
            @else
            movie
            @endif 
          
          </td>
          <td>{{ $movie->evaluate }}</td>
          <td>{{ $movie->released }}</td>
          <td>{{ $movie->time_period }}</td>
          {{-- <td>{{ $movie->description }}</td> --}}
          {{-- <td>@mdo</td> --}}
       
        </tr>
        @empty
          
        @endforelse
       
      </tbody>
    </table>
  </div>
  {{-- end container --}}
  
    </div>
</main>
<script  type="text/javascript" src=" {{ asset("js/filepond.js") }}"></script>
<script  >
    // Get a reference to the file input element
    const inputElement = document.querySelector('#filepond');
  
    // Create a FilePond instance
    const pond = FilePond.create(inputElement);
    FilePond.setOptions({
        server:  {
            url:'/upload',
            headers:{
                'X-CSRF-TOKEN':'{{ csrf_token() }}'
            }
        }
    });
  </script>
@endsection
