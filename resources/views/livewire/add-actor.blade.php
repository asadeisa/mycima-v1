   <section>

       <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
                <form wire:submit.prevent="saveContact">
                    <div>
    
                        @if (session()->has('message'))
                
                            <div class="alert alert-success "data-dismiss="modal">
                
                                {{ session('message') }}
                
                            </div>
                
                        @endif
                
                    </div>
    
                    <div class="my-2 w-100 d-flex flex-column">
                        <button type="submit" class="btn btn-primary w-quert my-3">Add Actor </button>
                        <section class="w-9">
                            @error('actorName') <span class="error">{{ $message }}</span> @enderror
                            <div class="form-outline w-9 my-3">
                                <input type="text" wire:model.lazy='actorName' id="form6Example1" class="form-control input-custom" />
                                <label class="form-label" for="form6Example1">Actor Name</label>
                            </div>
                            @error('actorReallName') <span class="error">{{ $message }}</span> @enderror
                            <div class="form-outline w-9 my-3">
    
                                <input type="text" wire:model.lazy="actorReallName" id="form6Example2" class="form-control input-custom" />
                                <label class="form-label" for="form6Example2">Actor Reall Name</label>
                            </div>
        
                        </section>
                    </div>
                </form>
    
            </div>
         
        </div>
        {{-- show the hero --}}
        <div class="card mb-4 mb-lg-0 my-3">
            <div class="card-body p-0">
    
                    <div class="my-2  d-flex flex-column ">
                        @forelse($allActor as $actor)
                        <div class="actor-info w-9 d-flex">
                            
                            <div class="profiel img-rounded ">
                                <img  width="70" height="70" laze src="{{ asset("image/actor.png") }}" alt="">
                            </div>
                            <div class="containt d-flex flex-column flex-2">
        
                                <div class="name w-9">
                                    <strong>Actor Real Name:</strong> <p class="inline">{{ $actor->actor_R_name }}</p> 
            
                                </div>
                                <div class="name w-9">
            
                                    <strong>Actor  Name: </strong> <p class="inline">{{ $actor->actor_name }}</p> 
                                </div>
                                <hr>
                                
                            </div>
                            <div class="delete my-2">

                                <button class="btn btn-danger " 
                                wire:click="deleteActor('{{ $actor->actor_R_name }}')" >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        
                        @empty
    
                        @endforelse 
                    </div>   
            </div>
    
        </div>
        
     
    
    
    </section>
    {{-- End of component --}}
    </div>
