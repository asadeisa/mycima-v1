
        
        <div class="col-lg-7" 
         x-data="{open:@entangle('open').defer}">
          <form
         wire:submit.prevent="submit"
         >
          <div class="card mb-4">
            <div class="card-body" >
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Movie Name</p>
                </div>
                <div class="col-sm-9">
                  @error('movieName') <span class="error">{{ $message }}</span> @enderror

                  <input x-show="!open"  class="text-muted mb-0 w-100"
                  type="text"  wire:model="movieName" name="movie_name" >
                  <p x-show="open" class="text-muted mb-0">{{ $movieInfo->movie_name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">language</p>
                </div>
                <div class="col-sm-9">
              <template  x-if="!open">
                                 {{-- dropdown --}}
              <div class="dropdown col disable-border" 
              x-data="{languages:@entangle('lang').defer}">
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
                  {{-- <input  type="hidden"
                
                   x-model="languages"
                    name="languages"> --}}
                </ul>
              </div>
              {{-- end drop --}}
                  </template>


                  <p x-show="open" class="text-muted mb-0">{{ $movieInfo->language }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">classification</p>
                </div>
                <div class="col-sm-9">

                  <template x-if="!open">
                   <div class="drop-show" >
                    <div class="dropdown col disable-border" 
                    x-data="{classification:@entangle('classfication').defer}">
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
                   </div>
                  </template>


                  <p x-show="open" class="text-muted mb-0">{{ $movieInfo->classification }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">series or filme</p>
                </div>
                <div class="col-sm-9">
                  {{-- <template x-if="!open"> --}}

                    <section x-show="!open">
                      <div class="form-check form-check-inline">
                        <input
                          wire:click="series(1)"
                          class="form-check-input"
                          type="radio"
                          name="filme"
                          id="inlineRadio1"
                          value="1"
                          @if($movieInfo->is_series ==1)
                          checked
                          @endif
                        />
                        <label class="form-check-label" for="inlineRadio1">series</label>
                      </div>
                      
                      <div class="form-check form-check-inline">
                        <input
                          wire:click="series(0)"
                          class="form-check-input"
                          type="radio"
                          name="filme"
                          id="inlineRadio2"
                          value="0"
                          @if($movieInfo->is_series ==0)
                          checked
                          @endif
                        />
                        <label class="form-check-label" for="inlineRadio2">movie</label>
                      </div>
                     
                    </section>
                  {{-- </template> --}}
                  <p  x-show="open" class="text-muted mb-0">
                    @if($movieInfo->is_series)
                    series
                    @else
                    movie
                    @endif
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Type</p>
                </div>
                <div class="col-sm-9">
                 
                  <template x-if="!open">
                       {{-- dropdown --}}
               <div x-data="{Type:@entangle('type').defer}" 
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
                  </template>

                  <p x-show="open" class="text-muted mb-0">{{ $movieInfo->type }}</p>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">evaluate</p>
                </div>
                <div class="col-sm-9">
                  <div x-show="!open">
                    @error('evaluet') <span class="error">{{ $message }}</span> @enderror

                    <input type="number" max="10"step="0.1"  wire:model="evaluet"
                     name="stars" min="1" id="typeEmail" class="form-control input-custom" />
                  </div>
                  <p x-show="open" class="text-muted mb-0">{{ $movieInfo->evaluate }}</p>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">released at</p>
                </div>
                <div class="col-sm-9">
                  @error('released') <span class="error">{{ $message }}</span> @enderror

                  <div x-show="!open">
                    <input type="number" name="yearRel" max="2200" wire:model="released"
                    step="1" min="1990" id="typeEmail" class="form-control input-custom" />
                  </div>

                  <p x-show="open" class="text-muted mb-0">{{ $movieInfo->released }}</p>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                
                  <p class="mb-0">time period</p>
                </div>
                <div class="col-sm-9">
                 
                  @error('hour') <span class="error">{{ $message }}</span> @enderror
                  @error('minute') <span class="error">{{ $message }}</span> @enderror
                  @error('second') <span class="error">{{ $message }}</span> @enderror
                  <div x-show="!open">
                    <div class="time ">
                      <input type="number"min="0" max="4" step="1"  wire:model="hour" name="h" >:
                      <input type="number"min="0" max="59"step="1"  wire:model="minute" name="m" >:
                      <input type="number"min="0" max="59"step="1"  wire:model="second" name="s" >
                    </div>
                  </div>

                  <p x-show="open" class="text-muted mb-0">{{ $movieInfo->time_period }}</p>
                </div>
              </div>
              <div class="my-4 d-flex col-sm-9 w-100  ">
                <button type="button"
                data-mdb-toggle="modal"
                data-mdb-target="#exampleModal"
                class="btn btn-danger mx-5 " >delete  </button>
                <button wire:click="setproperty" type="button" x-show="open" class="btn btn-info mx-5 " >Update </button>
                <div x-show="!open">
                  <button @click="open=!open" type="submit" class="btn btn-success mx-5 " >Save </button>
                </div>
              
              </div>
             
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <h4>The story </h4>
                 <p x-show="open" class="text-muted mb-0">
                      {{$movieInfo->description  }}
                 </p>
                 <div x-show="!open">
                  @error('description') <span class="error">{{ $message }}</span> @enderror

                   <div x-data="{description:@entangle('description').defer }" >

                     <textarea x-model="description" name="description"
                      class="form-control input-custom" 
                     id="exampleFormControlTextarea1" rows="3">
                     
                   
                   </textarea>
                   </div>
                 </div>
                </div>
              </div>
            </div>
        
          </div>
        </form>
        {{-- the delete model --}}
        <!-- Button trigger modal -->

<!-- Modal -->
      <div
      class="modal fade "
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
      >
      <div class="modal-dialog  modal-sm color-w">
        <div class="modal-content">
          <div class="modal-header text-centre justify-center bg-danger">
            <h5 class="modal-title w-9 " id="exampleModalLabel">Are You sure</h5>
            <button
              type="button"
              class="btn-close color-w"
              data-mdb-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body text-center font-bould">
            <strong class="color-r">
              <span>&#10005;</span> 

            </strong>
          </div>
          <div class="modal-footer justify-center">
            <button type="button" class="btn btn-outline-danger" data-mdb-dismiss="modal">
              No
            </button>
            <form 
            action="{{ route("dashboard.filem.destroy",$movieId) }}"
            method="post"
            {{-- action="dashboard/filem/destroy{$movieId}" --}}
             >
              @csrf
              @method("DELETE")
              <button type="submit" class="btn btn-danger">Yes</button>
            </form>
          </div>
        </div>
      </div>
      </div>
        </div>



