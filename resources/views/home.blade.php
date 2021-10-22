{{-- {{ dd( $HelperInfo) }} --}}
{{-- <script>
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

<script  src="{{ asset("js/k-meanss.js") }}"></script>
<script>
  let clustersPoint= [];
let clusterSipeliensUser =null;
let customerData = arrayuserdata;
// let data =helberdata


let result  = kmeans(helberdata,3);
console.log(result);

let clustersResult = result.clusters;
for(let i=0;i<clustersResult.length;i++)
{
  //  x.push(clustersResult[i].points);
  clustersPoint =clustersResult[i].points;
  // console.log(clustersPoint);
  for(let j=0;j<clustersPoint.length;j++)
  {
   
    if(  clustersPoint[j].length === customerData.length &&
      clustersPoint[j].every((val, index) => val === customerData[index])
     )
   {
     clusterSipeliensUser = clustersPoint;
     break
     
     
     
   }
  }
  if(clusterSipeliensUser != null){
    break
  }

}
   console.log(clustersPoint,"points");
  //  console.log(clusterSipeliensUser,"sipeliens");

</script>
 --}}


@extends("layout.layout")
@section("welcompag")
<x-header></x-header>
<section class="clear-content"
>

  <x-left-sid></x-left-sid>
  <x-right-sid></x-right-sid>
  <link rel="stylesheet" href="{{ asset("css/welcom.css")  }} " />

  {{-- welcom pages  --}}
  <section class="main-page col-lg-7 ">

    <div class="all-movie d-flex">
      @foreach($allmovie as $movie)
        
      <div class="card">
        <img
           {{-- src="{{asset("storage/avatars/".$img) }}" --}}
          src="{{ asset("storage/avatars/".$movie->img) }}"
          class="card-img-top"
          height="250"
          widht="150"
          alt="..."
        />
        <div class="card-body">
          <h5 class="card-title">{{ $movie->movie_name }}</h5>
          <p class="card-text">
         watch and downloud {{ $movie->movie_name }}
          </p>
          <a href="{{ route("show-filme",$movie->id) }}" class="btn btn-primary">show</a>
        </div>
      </div>
      @endforeach
     
</div>

    {{-- End the welcom page --}}
  </section>
</section>


<x-model-info></x-model-info>

@endsection