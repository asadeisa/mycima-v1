// for normal user
let clustersPoint= [];
let clusterSipeliensUser =null;
let customerData = arrayuserdata;
// let data =helberdata


let result  = kmeans(helberdata,5);
// console.log(result);

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
 
  //  console.log(clustersPoint,"sipeliens");
    let finalRezaltClustring  = JSON.stringify(clustersPoint)

  Livewire.emit('clusterRezalt',[finalRezaltClustring])
