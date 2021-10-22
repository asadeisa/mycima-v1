
            
          <div class="card mb-4">
            <div class="card-body text-center">
              <div  x-data="{uplod:false}">
                
                <div wire:loading wire:target="photo" >
                  <div class="loadingio-spinner-spinner-li5jg1s7pof"><div class="ldio-a3zxpnl4g3g">
                    <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
                    </div></div>
                </div>
                <div>

                  @if (session()->has('message'))
          
                      <div class="alert alert-success "data-dismiss="modal">
          
                          {{ session('message') }}
          
                      </div>
          
                  @endif
          
              </div>
                <form    wire:submit.prevent="save" >
                  @if ($photo)
  
                  Photo Preview:
                    
                  <img  src="{{ $photo->temporaryUrl() }}"width='250' class=" img-fluid image-h-2" 
                  style="width: 200px;  ">
                  @else

                  <img wire:model="photo" src="{{asset("storage/avatars/".$img) }}"
               
                   width='250' class=" img-fluid image-h-2" 
                  style="width: 200px;  ">
                  
              @endif
              
                  <div  style="position: relative;"  class="form-outline my-2 fallback">
                    <input  @click="uplod=true" wire:model="photo" class="avatar-photo"
                    type="file" name="avatar" id="filepond"  />
                   
                  </div>
                  <div x-show="uplod">
                    <button @click="uplod=false" class="btn btn-info" >uplod</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
