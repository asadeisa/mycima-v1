// acsses to div of recommended filme 

setTimeout(()=>{
  let showRecommendedDiv  = document.querySelector("#show-recommended");
  let recommended  = document.querySelector("#recommended");
  
  console.log(showRecommendedDiv.childNodes);
  if(showRecommendedDiv.childNodes != null && recommended != null)
  {
    recommended.addEventListener("click",()=>{
      showRecommendedDiv.style.display="block";
    })
  }

},2000)