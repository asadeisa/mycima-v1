{{-- {{ dd( $HelperInfo) }} --}}
@extends("layout.layout")
@section("welcompag")
<x-header></x-header>

<script>
  var userDataH = <?php echo $userDataHelper ?>;
  var helberInfo = <?php echo $HelperInfo ?>;
console.log(userDataH);
// console.log(helberInfo);
</script>
<script>
 var arrayuserdata = [];
 arrayuserdata[0] = userDataH[0].age
 arrayuserdata[1] = userDataH[0].avg_movie_time
 arrayuserdata[2] = userDataH[0].f_lang
 arrayuserdata[3] = userDataH[0].f_type
 arrayuserdata[4] = userDataH[0].have_family
 arrayuserdata[5] = userDataH[0].old
 arrayuserdata[6] = userDataH[0].sex
// console.log(arrayuserdata);


 var helberdata = [];
for (const [key, value] of Object.entries(helberInfo)) {
  // console.log(`${key}: ${value.sex}`);
  var y=[];
  helberdata.push(y);
 
}
let k = 0;
for (let [key, value] of Object.entries(helberInfo)) {
  // console.log(`${key-1}: ${value.sex}`);

  helberdata[k][0] = value.age;
  helberdata[k][1] = value.avg_movie_time;
  helberdata[k][2] = value.f_lang;
  helberdata[k][3] = value.f_type;
  helberdata[k][4] = value.have_family;
  helberdata[k][5] = value.old ;
  helberdata[k][6] = value.sex;
  k++;
}

// console.log(helberdata)


</script>





<section class="clear-content"
>

  <x-left-sid></x-left-sid>
  <x-right-sid></x-right-sid>
  <link rel="stylesheet" href="{{ asset("css/welcom.css")  }} " />
  <link rel="stylesheet" href="{{ asset("css/ribbon.css")  }} " />

  {{-- welcom pages  --}}
  <section class="main-page col-lg-7 ">
    <style> 
    #show-recommended{
      display: none;
    }  
    </style>

    <div >
    <div id="show-recommended">
      @livewire('recommended-k-movie',["is_series"=>$is_series])
      
    </div>

   @livewire('home-clustring',["is_series"=>$is_series])
   
    </div>

    {{-- End the welcom page --}}
  </section>
</section>

<script src="{{ asset("js/showRecommended.js") }}"></script>
<x-model-info></x-model-info>


@endsection