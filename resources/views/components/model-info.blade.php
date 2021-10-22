<div>
  
<!-- Modal -->
<div
class="modal fade"
id="exampleModal"
tabindex="-1"
aria-labelledby="exampleModalLabel"
aria-hidden="true"
>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title text-center" id="exampleModalLabel">additional Information </h5>
      <button
        type="button"
        class="btn-close"
        data-mdb-dismiss="modal"
        aria-label="Close"
      ></button>
    </div>
    <form action="{{ route("helper-info") }}"method="post" >
    <div class="modal-body  ">
      <h5 class="my-3 text-center color-primary">
          share  more details that help us  
          to propose  best movie for you 
        </h5>
  
          <div class="container">
            @csrf
            <!-- Default radio -->
       <div class="sex d-flex my-3">
         
        <div class="form-check mx-3">
          <input
            class="form-check-input"
            type="radio"
            name="sex"
            id="flexRadioDefault1"
            value="0"
          />
          <label class="form-check-label " for="flexRadioDefault1"> Male   </label>
          <i class="fas fa-male fa-lg color-primary"></i>
  
        </div>
        
        <!-- Default checked radio -->
        <div class="form-check mx-3">
          <input
            class="form-check-input"
            type="radio"
            name="sex"
            id="flexRadioDefault2"
            value="10"
            checked
          />
          <label class="form-check-label" for="flexRadioDefault2"> Female </label>
          <i class="fas fa-female fa-lg color-primary "></i>
        </div>
         </div>   
         {{-- f type --}}
         <div class="ftype my-3">
           your favorite type
            <select name="type">
              @php
              $movietype =  ["Action",
                            "Romance",
                            "war",
                            "anime",
                            "drama",
                            "horror",
                            "comic",]
            @endphp
            @for($i = 0; $i <count($movietype) ; $i++)
            <option value="{{ $i*10 }}">{{ $movietype[$i] }}</option>
            
            @endfor
            </select>
  
         </div>
         <div class="lung my-4">
          select your favorite languages
          <select name="languages" >
            @php
            $movielaung =  ["Arabic",
                              "Spain",
                              "Korean",
                              "French",
                              "German",
                              "English UK",
                              "English USA",
                            "Indian",]
          @endphp
          @for($i = 0; $i < count($movielaung); $i++)
            <option value=" {{$i*10}}">
                {{ $movielaung[$i]}}
            </option>
          @endfor
          </select>
        </div>
  
        <div class="old my-4">
          <select name="old" >
            <option value="10">historical</option>
            <option value="20">modern</option>
            <option value="30">future</option>
            <option value="40">technology</option>
            <option value="50">realistic</option>
            <option value="60">Imaginary</option>
          </select>
        </div>
        {{-- age  --}}
  <div class=" age" >

    <div class="form-outline mb-3">
  
    <input type="number" 
    name="age" min="13" max="100" step="1" 
     defult="18"   id="age"
     class="form-control form-control-lg"
     >
    <label 
    class="form-label" 
    for="age">yor age </label>
    </div>
  </div>
  
          <!-- Default radio -->
          <div class="sex d-flex my-3">
         
            <div class="form-check mx-3">
              <input
                class="form-check-input"
                type="radio"
                name="have_family"
                id="flexRadioDefault1"
                value="0"
                checked

              />
              <label class="form-check-label "
               for="flexRadioDefault1"> single   </label>
             
      
            </div>
            
            <!-- Default checked radio -->
            <div class="form-check mx-3">
              <input
                class="form-check-input"
                type="radio"
                name="have_family"
                id="flexRadioDefault2"
                value="10"
              />
              <label class="form-check-label" 
              for="flexRadioDefault2"> married </label>
             
            </div>
            <div class="form-check mx-3">
              <input
                class="form-check-input"
                type="radio"
                name="have_family"
                value="20"
                id="flexRadioDefault2"
                
              />
              <label class="form-check-label"
               for="flexRadioDefault2"> have family </label>
             
            </div>
             </div> 
  
             <label for="customRange3" class="form-label"> </label>
            <div class="range">
               movie pireud 
              <input type="range" class="form-range" name="avg_movie_time"
              min="1" max="5" step="1" id="customRange3" />
            </div>
  
  
          </div>
          
          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
  </div>
</div>
</div>


</div>